<?php
namespace App\Controller;
//namespace App\Mailer;


use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Core\Configure;
use Cake\Core\App;
use Cake\Mailer\Email;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if($this->request->session()->read('currentUser')['auth'] > 0) {
            $flag = $this->request->session()->read('flag');
            $this->paginate = [
                'conditions' => [
                    'Users.auth' => 0
                ]
            ];
            $users = $this->paginate($this->Users);
            $title = 'User|List';

            $this->set(compact('users', 'title', 'flag'));
            $this->set('_serialize', ['users']);
        } else {
            return $this->redirect(['controller'=>'Apartments', 'action' => 'index']);
        }
    }

    /**
     * Operator Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function opindex()
    {
        if($this->request->session()->read('currentUser')['auth'] > 0) {
            $flag = $this->request->session()->read('flag');
            $this->paginate = [
            'conditions' => [
                'Users.auth' => 1
                ]
            ];
            $users = $this->paginate($this->Users);
            $title = 'User|List|operators';

            $this->set(compact('users', 'title', 'flag'));
            $this->set('_serialize', ['users']);
        } else {
            return $this->redirect(['controller'=>'Apartments', 'action' => 'index']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->request->session()->read('currentUser')['auth'] > 0) {
            $user = $this->Users->newEntity();
            $auth = User::AUTH;
            $title = 'User|Add';
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $mailPassword = $this->request->data('password');
                $user->password = md5($mailPassword);
                if ($this->request->data('auth') == 0){
                    if ($this->request->data['validity'] == 0){
                        $user->validity = 7;
                    }
                }
                if ($this->Users->save($user)) {
                    $this->request->session()->write('flag', 1);
                    if ($user->auth == 0) {
                        $email = new Email();
                        $email
                            ->setTemplate('notification')
                            ->setViewVars(['name' => $user->name, 'validity' => $user->validity, 'username' => $user->username, 'password' => $mailPassword])
                            ->setLayout('notification')
                            ->setEmailFormat('html')
                            ->setSubject('Welcome to Asahi Service Company!')
                            ->setTo($user->email)
                            ->setFrom(['admin@asahiservices.com' => 'Asahi Service Company'])
                            ->send();
                        return $this->redirect(['action' => 'index']);
                    } else {
                        return $this->redirect(['action' => 'opindex']);
                    }
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $this->set(compact('user', 'auth', 'title', 'flag'));
            $this->set('_serialize', ['user']);
        } else {
            return $this->redirect(['controller'=>'Apartments', 'action' => 'index']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->request->session()->read('currentUser')['auth'] > 0) {
            $user = $this->Users->get($id);
            if ($user['auth'] == 1 && $this->request->session()->read('currentUser')['auth'] > 1){
                if ($this->Users->delete($user)) {
                    $this->request->session()->write('flag', 2);
                }
                return $this->redirect(['action' => 'opindex']);
            }
            if ($user['auth'] == 0){
                if ($this->Users->delete($user)) {
                    $this->request->session()->write('flag', 2);
                }
                return $this->redirect(['action' => 'index']);
            }
        }
        return $this->redirect(['controller' => 'Apartments', 'action' => 'index']);
    }

    /**
     * ログイン画面
     * @return \Cake\Network\Response|void
     */
    public function login()
    {
        $this->viewBuilder()->setLayout(false);
        if ($this->request->is('post')) {

            $user = $this->Auth->identify();
            $this->request->session()->write('currentUser',$user);
            $this->Auth->setUser($user);
            if ($user['auth'] == 0){
                return $this->redirect(['controller' => 'Apartments', 'action' => 'index']);
            }
            return $this->redirect($this->Auth->redirectUrl());
        }
    }

    public function logout()
    {
        $this->Cookie->delete('login_token');
        return $this->redirect($this->Auth->logout());
    }

    public function dashboard()
    {
        $this->loadModel('Apartments');
        $this->Auth->config('authError', false);
        $apartmentCount = $this->Apartments->find('all')->count();
        $guestCount = $this->Users->find('all')->where(['Users.auth =' => 0])->count();
        $operatorCount = $this->Users->find('all')->where(['Users.auth =' => 1])->count();

        $title = 'Dashboard';
        $this->set(compact('title', 'apartmentCount', 'guestCount', 'operatorCount'));
    }
}
