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
            <?= $this->Html->link(__('Edit Detailpenjualan'), ['action' => 'edit', $detailpenjualanEntity->id_detail], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Detailpenjualan'), ['action' => 'delete', $detailpenjualanEntity->id_detail], ['confirm' => __('Are you sure you want to delete # {0}?', $detailpenjualanEntity->id_detail), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Detailpenjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Detailpenjualan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailpenjualan view content">
            <h3><?= h($detailpenjualanEntity->id_detail) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id Detail') ?></th>
                    <td><?= $this->Number->format($detailpenjualanEntity->id_detail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Penjualan') ?></th>
                    <td><?= $this->Number->format($detailpenjualanEntity->id_penjualan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Produk') ?></th>
                    <td><?= $this->Number->format($detailpenjualanEntity->id_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jumlah Produk') ?></th>
                    <td><?= $this->Number->format($detailpenjualanEntity->jumlah_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subtotal') ?></th>
                    <td><?= $this->Number->format($detailpenjualanEntity->subtotal) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>