<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $productEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $productEntity->id_product], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $productEntity->id_product], ['confirm' => __('Are you sure you want to delete # {0}?', $productEntity->id_product), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Product'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="product view content">
            <h3><?= h($productEntity->nama_product) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nama Product') ?></th>
                    <td><?= h($productEntity->nama_product) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Product') ?></th>
                    <td><?= $this->Number->format($productEntity->id_product) ?></td>
                </tr>
                <tr>
                    <th><?= __('Harga') ?></th>
                    <td><?= $this->Number->format($productEntity->harga) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock') ?></th>
                    <td><?= $this->Number->format($productEntity->stock) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>