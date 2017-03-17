<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Core\Configure;
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
        $this->paginate = [
            'conditions' => [
                'Users.auth' => 0
            ]
        ];
        $users = $this->paginate($this->Users);
        $title = 'User|List';

        $this->set(compact('users', 'title'));
        $this->set('_serialize', ['users']);
    }

    /**
     * Operator Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function opindex()
    {
        $this->paginate = [
            'conditions' => [
                'Users.auth' => 1
            ]
        ];
        $users = $this->paginate($this->Users);
        $title = 'User|List|operators';

        $this->set(compact('users', 'title'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        $auth = User::AUTH;
        $title = 'User|Add';
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->password = md5($this->request->data['password']);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user', 'auth', 'title'));
        $this->set('_serialize', ['user']);
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
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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

            if ($user && $user['state'] == 1) {
                $this->Auth->setUser($user);
                // ログイン時のリダイレクト
                return $this->redirect($this->Auth->redirectUrl());
            }
            //$this->Flash->error('Login Failed, Please check Username and Password');
        }
    }

    public function logout()
    {
        $this->Cookie->delete('login_token');
        return $this->redirect($this->Auth->logout());
    }

    public function dashboard()
    {
        $title = 'Dashboard';
        $this->set(compact('title'));
    }
}
