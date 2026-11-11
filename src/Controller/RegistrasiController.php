<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Registrasi Controller
 *
 * @property \App\Model\Table\RegistrasiTable $Registrasi
 */
class RegistrasiController extends AppController
{
    
    public function register()
    {
        $registrasi = $this->Registrasi->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $registrasi = $this->Registrasi->patchEntity($registrasi, $this->request->getData());
            if ($this->Registrasi->save($registrasi)) {
                $this->Flash->success(__('Registrasi berhasil! Silakan login.'));
                return $this->redirect(['controller' => 'Login', 'action' => 'index']);
            }
            $this->Flash->error(__('Registrasi gagal, coba lagi.'));
        }
        $this->set(compact('registrasi'));
    }

    /**
     * Index method
     */
    public function index()
    {
        $query = $this->Registrasi->find();
        $registrasi = $this->paginate($query);

        $this->set(compact('registrasi'));
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        $registrasiEntity = $this->Registrasi->get($id, contain: []);
        $this->set(compact('registrasiEntity'));
    }

    /**
     * Add method
     */
    public function add()
    {
        $registrasiEntity = $this->Registrasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $registrasiEntity = $this->Registrasi->patchEntity($registrasiEntity, $this->request->getData());
            if ($this->Registrasi->save($registrasiEntity)) {
                $this->Flash->success(__('The registrasi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registrasi could not be saved. Please, try again.'));
        }
        $this->set(compact('registrasiEntity'));
    }

    /**
     * Edit method
     */
    public function edit($id = null)
    {
        $registrasiEntity = $this->Registrasi->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registrasiEntity = $this->Registrasi->patchEntity($registrasiEntity, $this->request->getData());
            if ($this->Registrasi->save($registrasiEntity)) {
                $this->Flash->success(__('The registrasi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registrasi could not be saved. Please, try again.'));
        }
        $this->set(compact('registrasiEntity'));
    }

    /**
     * Delete method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registrasiEntity = $this->Registrasi->get($id);
        if ($this->Registrasi->delete($registrasiEntity)) {
            $this->Flash->success(__('The registrasi has been deleted.'));
        } else {
            $this->Flash->error(__('The registrasi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
