<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registrasi $registrasiEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Registrasi'), ['action' => 'edit', $registrasiEntity->id_user], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Registrasi'), ['action' => 'delete', $registrasiEntity->id_user], ['confirm' => __('Are you sure you want to delete # {0}?', $registrasiEntity->id_user), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Registrasi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Registrasi'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="registrasi view content">
            <h3><?= h($registrasiEntity->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($registrasiEntity->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($registrasiEntity->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id User') ?></th>
                    <td><?= $this->Number->format($registrasiEntity->id_user) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>