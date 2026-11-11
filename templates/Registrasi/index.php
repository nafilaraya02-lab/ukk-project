<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Login> $login
 */
?>
<div class="login index content">
    <?= $this->Html->link(__('New Registrasi'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Registrasi') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_user') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($login as $registrasiEntity): ?>
                <tr>
                    <td><?= $this->Number->format($registrasiEntity->id_user) ?></td>
                    <td><?= h($registrasiEntity->username) ?></td>
                    <td><?= h($registrasiEntity->email) ?></td>
                    <td><?= h($registrasiEntity->role) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $registrasiEntity->id_user]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $registrasiEntity->id_user]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $registrasiEntity->id_user],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $registrasiEntity->id_user),
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