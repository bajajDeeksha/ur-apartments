<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Apartment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="apartments index large-9 medium-8 columns content">
    <h3><?= __('Apartments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('area_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('floor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model_plan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_fee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facilities') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($apartments as $apartment): ?>
            <tr>
                <td><?= $this->Number->format($apartment->id) ?></td>
                <td><?= h($apartment->name) ?></td>
                <td><?= $apartment->has('area') ? $this->Html->link($apartment->area->id, ['controller' => 'Areas', 'action' => 'view', $apartment->area->id]) : '' ?></td>
                <td><?= h($apartment->address) ?></td>
                <td><?= $this->Number->format($apartment->floor) ?></td>
                <td><?= $this->Number->format($apartment->size) ?></td>
                <td><?= h($apartment->model_plan) ?></td>
                <td><?= $this->Number->format($apartment->rent) ?></td>
                <td><?= $this->Number->format($apartment->service_fee) ?></td>
                <td><?= h($apartment->facilities) ?></td>
                <td><?= h($apartment->image1) ?></td>
                <td><?= h($apartment->image2) ?></td>
                <td><?= h($apartment->image3) ?></td>
                <td><?= h($apartment->created) ?></td>
                <td><?= h($apartment->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $apartment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $apartment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $apartment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apartment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
