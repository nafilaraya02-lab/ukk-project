<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detailpenjualan $detailpenjualanEntity
 * @var int|string|null $id_penjualan
 * @var array $productList
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Detailpenjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailpenjualan form content">
            <?= $this->Form->create($detailpenjualanEntity) ?>
            <fieldset>
                <legend><?= __('Add Detailpenjualan') ?></legend>
                <?php
                    echo $this->Form->control('id_penjualan', ['type' => 'text', 'value' => $id_penjualan, 'readonly' => true, 'label' => 'ID Penjualan']);
                    echo $this->Form->control('id_produk', ['options' => $productList, 'empty' => '---Pick Product---', 'label' => 'Product']);
                    echo $this->Form->control('jumlah_produk', ['type' => 'number', 'min' => 1, 'value' => 1, 'label' => 'Jumlah Product']);
                    echo $this->Form->control('subtotal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Add product')) ?>
            <?= $this->Form->end() ?>

            <br>
            <a href="<?= $this->Url->build(['controller' => 'Penjualan', 'action' => 'index']) ?>" class="button button-outline">Back to List</a>
        </div>
    </div>
</div>
