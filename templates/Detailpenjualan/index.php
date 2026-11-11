<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Detailpenjualan> $detailpenjualan
 */
?>
<div class="detailpenjualan index content">
    <?= $this->Html->link(__('New Detailpenjualan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Detailpenjualan') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_detail') ?></th>
                    <th><?= $this->Paginator->sort('id_penjualan') ?></th>
                    <th><?= $this->Paginator->sort('id_produk') ?></th>
                    <th><?= $this->Paginator->sort('jumlah_produk') ?></th>
                    <th><?= $this->Paginator->sort('subtotal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detailpenjualan as $detailpenjualanEntity): ?>
                <tr>
                    <td><?= $this->Number->format($detailpenjualanEntity->id_detail) ?></td>
                    <td><?= $this->Number->format($detailpenjualanEntity->id_penjualan) ?></td>
                    <td><?= $this->Number->format($detailpenjualanEntity->id_produk) ?></td>
                    <td><?= $this->Number->format($detailpenjualanEntity->jumlah_produk) ?></td>
                    <td><?= $this->Number->format($detailpenjualanEntity->subtotal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detailpenjualanEntity->id_detail]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detailpenjualanEntity->id_detail]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $detailpenjualanEntity->id_detail],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $detailpenjualanEntity->id_detail),
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