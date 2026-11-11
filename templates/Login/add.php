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
            <?= $this->Html->link(__('List Login'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="login form content">
            <?= $this->Form->create($loginEntity) ?>
            <fieldset>
                <legend><?= __('Add Login') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('email');
                    echo $this->Form->control('role', ['options' => ['admin' => 'admin', 'petugas' => 'petugas']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
