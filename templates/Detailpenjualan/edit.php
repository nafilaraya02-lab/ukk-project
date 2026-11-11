<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detailpenjualan $detailpenjualanEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $detailpenjualanEntity->id_detail],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detailpenjualanEntity->id_detail), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Detailpenjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailpenjualan form content">
            <?= $this->Form->create($detailpenjualanEntity) ?>
            <fieldset>
                <legend><?= __('Edit Detailpenjualan') ?></legend>
                <?php
                    echo $this->Form->control('id_penjualan');
                    echo $this->Form->control('id_produk');
                    echo $this->Form->control('jumlah_produk');
                    echo $this->Form->control('subtotal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
