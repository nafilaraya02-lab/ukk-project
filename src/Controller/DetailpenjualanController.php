<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Detailpenjualan Controller
 *
 * @property \App\Model\Table\DetailpenjualanTable $Detailpenjualan
 */
class DetailpenjualanController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Detailpenjualan->find();
        $detailpenjualan = $this->paginate($query);

        $this->set(compact('detailpenjualan'));
    }

    /**
     * View method
     *
     * @param string|null $id Detailpenjualan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailpenjualanEntity = $this->Detailpenjualan->get($id, contain: []);
        $this->set(compact('detailpenjualanEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id_penjualan = null)
    {
        $detailpenjualanEntity = $this->Detailpenjualan->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $productTable = $this->fetchTable('Product');
            $product = $productTable->get($data['id_product']);
            $data['subtotal'] = $product->harga * (int)$data['jumlah_product'];

            $detailpenjualanEntity = $this->Detailpenjualan->patchEntity($detailpenjualanEntity, $data);
            if ($this->Detailpenjualan->save($detailpenjualanEntity)) {
                $query = $this->Detailpenjualan->find()
                    ->where(['id_penjualan' => $detailpenjualanEntity->id_penjualan]);
                $newTotal = $query->select(['total' => $query->func()->sum('subtotal')])->first()->total ?? 0;

                $penjualanTable = $this->fetchTable('Penjualan');
                $penjualan = $penjualanTable->get($detailpenjualanEntity->id_penjualan);
                $penjualan->total_harga = $newTotal;
                $penjualanTable->save($penjualan);

                $this->Flash->success(__('The detailpenjualan has been saved.'));

                return $this->redirect(['action' => 'add', $detailpenjualanEntity->id_penjualan]);
            }
            $this->Flash->error(__('The detailpenjualan could not be saved. Please, try again.'));
        }

        $productList = $this->Detailpenjualan->Product->find('list', ['keyField' => 'id_product', 'valueField' => function ($row) {
            return $row->nama_product . ' (Rp ' . number_format((float)$row->harga, 0, ',', '.');
        }
        ])->toArray();

        $this->set(compact('detailpenjualanEntity','id_penjualan','productList'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Detailpenjualan id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailpenjualanEntity = $this->Detailpenjualan->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailpenjualanEntity = $this->Detailpenjualan->patchEntity($detailpenjualanEntity, $this->request->getData());
            if ($this->Detailpenjualan->save($detailpenjualanEntity)) {
                $this->Flash->success(__('The detailpenjualan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detailpenjualan could not be saved. Please, try again.'));
        }
        $this->set(compact('detailpenjualanEntity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detailpenjualan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailpenjualanEntity = $this->Detailpenjualan->get($id);
        if ($this->Detailpenjualan->delete($detailpenjualanEntity)) {
            $this->Flash->success(__('The detailpenjualan has been deleted.'));
        } else {
            $this->Flash->error(__('The detailpenjualan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
