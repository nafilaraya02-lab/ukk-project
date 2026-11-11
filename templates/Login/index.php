<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Login> $login
 */
?>
<div class="login index content">
    <?= $this->Html->link(__('New Login'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Login') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_user') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($login as $loginEntity): ?>
                <tr>
                    <td><?= $this->Number->format($loginEntity->id_user) ?></td>
                    <td><?= h($loginEntity->username) ?></td>
                    <td><?= h($loginEntity->email) ?></td>
                    <td><?= h($loginEntity->role) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $loginEntity->id_user]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loginEntity->id_user]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $loginEntity->id_user],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $loginEntity->id_user),
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