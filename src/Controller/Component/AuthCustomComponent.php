<?php
namespace App\Controller\Component;

use Cake\Controller\Component\AuthComponent;
use Cake\Controller\Controller;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Network\Response;

/**
 * AuthComponent拡張
 */
class AuthCustomComponent extends AuthComponent
{
    const DEFAULT_REDIRECT_URL = '/users/dashboard';

    /**
     * AuthComponent拡張
     * @param Controller $controller
     * @return Response|void
     */
    protected function _unauthenticated(Controller $controller)
    {

        if (empty($this->_authenticateObjects)) {
            $this->constructAuthenticate();
        }
        $auth = end($this->_authenticateObjects);
        $result = $auth->unauthenticated($this->request, $this->response);
        if ($result !== null) {
            return $result;
        }

        // ログイン画面で、かつリダイレクトURLセッションが空の場合、リダイレクトURLをセットする場合
        if ($this->_isLoginAction($controller)) {
            if (empty($controller->request->data) &&
                !$this->session->check('Auth.redirect') &&
                $this->request->env('HTTP_REFERER')
            ) {
                $this->session->write('Auth.redirect', $controller->referer(null, true));
            }
            return;
        }

        // Ajaxじゃない場合
        if (!$controller->request->is('ajax')) {
            $this->flash($this->_config['authError']);
            $this->session->write('Auth.redirect', $controller->request->here(false));
            return $controller->redirect($this->_config['loginAction']);

        // Ajaxの場合
        } else {
            $redirectUrl = $this->request->header('X-Requested-Uri');
            if(!$redirectUrl) $redirectUrl = self::DEFAULT_REDIRECT_URL;
            $this->session->write('Auth.redirect', $redirectUrl);
        }

        // Ajaxログイン画面の設定がある場合
        if (!empty($this->_config['ajaxLogin'])) {
            $controller->viewPath = 'Element';
            $response = $controller->render(
                $this->_config['ajaxLogin'],
                $this->RequestHandler->ajaxLayout
            );
            $response->statusCode(401);
            return $response;
        }

        // ステータスコード401返却
        $this->response->statusCode(401);
        return $this->response;
    }

    /**
     * AuthComponent拡張
     * @param null $url
     * @return mixed|null|string
     */
    public function redirectUrl($url = null)
    {
        if ($url !== null) {
            $redir = $url;
            $this->session->write('Auth.redirect', $redir);
        } elseif ($this->session->check('Auth.redirect')) {
            $redir = $this->session->read('Auth.redirect');
            $this->session->delete('Auth.redirect');

            if (Router::normalize($redir) === Router::normalize($this->_config['loginAction'])) {
                $redir = $this->_config['loginRedirect'];
            }
        } elseif ($this->_config['loginRedirect']) {
            $redir = $this->_config['loginRedirect'];
        } else {
            $redir = self::DEFAULT_REDIRECT_URL;
        }
        if (is_array($redir)) {
            return Router::url($redir + ['_base' => false]);
        }
        return $redir;
    }
}