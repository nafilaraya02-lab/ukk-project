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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productEntity->id_product],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productEntity->id_product), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Product'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="product form content">
            <?= $this->Form->create($productEntity) ?>
            <fieldset>
                <legend><?= __('Edit Product') ?></legend>
                <?php
                    echo $this->Form->control('nama_product');
                    echo $this->Form->control('harga');
                    echo $this->Form->control('stock');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
