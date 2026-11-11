<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Login Controller
 *
 * @property \App\Model\Table\LoginTable $Login
 */
class LoginController extends AppController
{
    public function login()
{
    if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error(__('Username atau password tidak valid'));
    }
}
public function register()
{
    $user = $this->Login->newEmptyEntity();
    if ($this->request->is('post')) {
        $user = $this->Login->patchEntity($user, $this->request->getData());
        if ($this->Login->save($user)) {
            $this->Flash->success(__('Registrasi berhasil.'));
            return $this->redirect(['action' => 'login']);
        }
        $this->Flash->error(__('Registrasi gagal, coba lagi.'));
    }
    $this->set(compact('user'));
}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Login->find();
        $login = $this->paginate($query);

        $this->set(compact('login'));
    }

    /**
     * View method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loginEntity = $this->Login->get($id, contain: []);
        $this->set(compact('loginEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loginEntity = $this->Login->newEmptyEntity();
        if ($this->request->is('post')) {
            $loginEntity = $this->Login->patchEntity($loginEntity, $this->request->getData());
            if ($this->Login->save($loginEntity)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login could not be saved. Please, try again.'));
        }
        $this->set(compact('loginEntity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loginEntity = $this->Login->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loginEntity = $this->Login->patchEntity($loginEntity, $this->request->getData());
            if ($this->Login->save($loginEntity)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login could not be saved. Please, try again.'));
        }
        $this->set(compact('loginEntity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loginEntity = $this->Login->get($id);
        if ($this->Login->delete($loginEntity)) {
            $this->Flash->success(__('The login has been deleted.'));
        } else {
            $this->Flash->error(__('The login could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
