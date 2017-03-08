<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $apartment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $apartment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Apartments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="apartments form large-9 medium-8 columns content">
    <?= $this->Form->create($apartment) ?>
    <fieldset>
        <legend><?= __('Edit Apartment') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('area_id', ['options' => $areas, 'empty' => true]);
            echo $this->Form->control('address');
            echo $this->Form->control('floor');
            echo $this->Form->control('size');
            echo $this->Form->control('model_plan');
            echo $this->Form->control('rent');
            echo $this->Form->control('service_fee');
            echo $this->Form->control('facilities');
            echo $this->Form->control('traffic');
            echo $this->Form->control('remarks');
            echo $this->Form->control('image1');
            echo $this->Form->control('image2');
            echo $this->Form->control('image3');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
