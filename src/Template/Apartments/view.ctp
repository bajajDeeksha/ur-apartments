<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Apartment'), ['action' => 'edit', $apartment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Apartment'), ['action' => 'delete', $apartment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apartment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Apartments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Apartment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="apartments view large-9 medium-8 columns content">
    <h3><?= h($apartment->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($apartment->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area') ?></th>
            <td><?= $apartment->has('area') ? $this->Html->link($apartment->area->id, ['controller' => 'Areas', 'action' => 'view', $apartment->area->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($apartment->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model Plan') ?></th>
            <td><?= h($apartment->model_plan) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facilities') ?></th>
            <td><?= h($apartment->facilities) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image1') ?></th>
            <td><?= h($apartment->image1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image2') ?></th>
            <td><?= h($apartment->image2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image3') ?></th>
            <td><?= h($apartment->image3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($apartment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor') ?></th>
            <td><?= $this->Number->format($apartment->floor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= $this->Number->format($apartment->size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent') ?></th>
            <td><?= $this->Number->format($apartment->rent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service Fee') ?></th>
            <td><?= $this->Number->format($apartment->service_fee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($apartment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($apartment->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Traffic') ?></h4>
        <?= $this->Text->autoParagraph(h($apartment->traffic)); ?>
    </div>
    <div class="row">
        <h4><?= __('Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($apartment->remarks)); ?>
    </div>
</div>
