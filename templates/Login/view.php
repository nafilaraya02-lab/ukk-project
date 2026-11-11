<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Login $loginEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Login'), ['action' => 'edit', $loginEntity->id_user], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Login'), ['action' => 'delete', $loginEntity->id_user], ['confirm' => __('Are you sure you want to delete # {0}?', $loginEntity->id_user), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Login'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Login'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="login view content">
            <h3><?= h($loginEntity->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($loginEntity->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($loginEntity->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($loginEntity->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id User') ?></th>
                    <td><?= $this->Number->format($loginEntity->id_user) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>