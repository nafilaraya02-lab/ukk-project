<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $product
 */
?>
<div class="product index content">
    <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Product') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_product') ?></th>
                    <th><?= $this->Paginator->sort('nama_product') ?></th>
                    <th><?= $this->Paginator->sort('harga') ?></th>
                    <th><?= $this->Paginator->sort('stock') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($product as $productEntity): ?>
                <tr>
                    <td><?= $this->Number->format($productEntity->id_product) ?></td>
                    <td><?= h($productEntity->nama_product) ?></td>
                    <td><?= $this->Number->format($productEntity->harga) ?></td>
                    <td><?= $this->Number->format($productEntity->stock) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productEntity->id_product]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productEntity->id_product]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $productEntity->id_product],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $productEntity->id_product),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>