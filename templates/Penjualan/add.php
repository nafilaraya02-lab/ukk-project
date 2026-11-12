<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penjualan $penjualanEntity
 * @var array $pelanggan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="penjualan form content">
            <?= $this->Form->create($penjualanEntity) ?>
            <fieldset>
                <legend><?= __('Add Transaksi Penjualan') ?></legend>
                <?php
                    echo $this->Form->control('nama_product');
                    echo $this->Form->control('tanggal_penjualan', ['value' => date('Y-m-d')]);
                    echo $this->Form->control('total_harga');
                    echo $this->Form->control('id_pelanggan', ['options' => $pelanggan, 'empty' => '--Pilih Pelanggan--', 'label' => 'Pelanggan']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Pick Product')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
