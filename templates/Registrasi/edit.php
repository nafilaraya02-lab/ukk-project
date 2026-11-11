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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $registrasiEntity->id_user],
                ['confirm' => __('Are you sure you want to delete # {0}?', $registrasiEntity->id_user), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Registrasi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="registrasi form content">
            <?= $this->Form->create($registrasiEntity) ?>
            <fieldset>
                <legend><?= __('Edit Registrasi') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
