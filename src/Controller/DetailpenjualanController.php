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
        $query = $this->Detailpenjualan->find()
            ->contain(['Penjualan', 'Product'])
            ->orderBy(['Detailpenjualan.id_detail' => 'DESC']);
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
        $detailpenjualanEntity = $this->Detailpenjualan->get($id, contain: [
            'contain' => ['Penjualan', 'Product'],
        ]);
        $this->set(compact('detailpenjualanEntity'));
    }

    /**
     * Add method
     *
     * @param string|null $id_penjualan Penjualan id.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id_penjualan = null)
    {
        $detailpenjualanEntity = $this->Detailpenjualan->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $jumlahBeli = (int)$data['jumlah_product'];

            $productTable = $this->fetchTable('Product');
            $product = $productTable->get($data['id_product']);
            if ($product->stock < $jumlahBeli) {
                $this->Flash->error(__('Stok tidak mencukupi! Sisa stok ' . $product->nama_product . 'hanya' . $product->stock . '.'));
                return $this->redirect(['action' => 'add', $id_penjualan]);
            }
            if (empty($data['id_penjualan']) && $id_penjualan) {
                $data['id_penjualan'] = $id_penjualan;
            }
            $data['subtotal'] = $product->harga * $jumlahBeli;

            $detailpenjualanEntity = $this->Detailpenjualan->patchEntity($detailpenjualanEntity, $data);
            if ($this->Detailpenjualan->save($detailpenjualanEntity)) {

                $product->stock = $product->stock - $jumlahBeli;
                $productTable->save($product);

                $semuaDetail = $this->Detailpenjualan->find()
                    ->contain(['Product'])
                    ->where(['Detailpenjualan.id_penjualan' => $detailpenjualanEntity->id_penjualan])
                    ->all();

                    $daftarNama = [];
                    $newTotal = 0;
                    foreach ($semuaDetail as $d) {
                        $newTotal += (float)$d->subtotal;
                        if ($d->has('product')) {
                            $daftarNama[] = $d->product->nama_product . '(' . $d->jumlahproduct . 'x)';
                        }
                    }

                $penjualanTable = $this->fetchTable('Penjualan');
                $penjualan = $penjualanTable->get($detailpenjualanEntity->id_penjualan);
                $penjualan->total_harga = $newTotal;
                $penjualan->nama_product = implode(',', $daftarNama);
                $penjualanTable->save($penjualan);

                $this->Flash->success(__('The detailpenjualan has been saved.'));

                return $this->redirect(['action' => 'add', $detailpenjualanEntity->id_penjualan]);
            }
            $this->Flash->error(__('The detailpenjualan could not be saved. Please, try again.'));
        }

        $productList = $this->fetchTable('Product')->find('list', [
            'keyField' => 'id_product',
            'valueField' => function ($row) {
                return $row->nama_product . ' - Rp ' . number_format((float)$row->harga, 0, ',', '.') . ' (Stok: ' . $row->stok . ')';
            }
        ])->toArray();

        $detailList = [];
        if (!empty($id_penjualan)) {
            $detailList = $this->Detailpenjualan->find()
            ->contain(['Product'])
            ->where(['Detailpenjualan.id_penjualan' => $id_penjualan])
            ->all();
        }
        
        $this->set(compact('detailpenjualanEntity', 'id_penjualan', 'productList', 'detailList'));
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
