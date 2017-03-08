<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Apartments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?></li>
    </ul>
</nav>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $(".prefecture").change(function()
        {
            var prefecture=$(this).find(":selected").text();
            $.ajax
            ({
                type: "POST",
                url: "getWards",
                data: prefecture,
                cache: false,
                success: function(html)
                {
                    $(".ward").html(html);
                }
            });

        });

    });
</script>
<div class="apartments form large-9 medium-8 columns content">
    <?= $this->Form->create($apartment) ?>
    <fieldset>
        <legend><?= __('Add Apartment') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('prefecture', ['class' => 'prefecture', 'options' => array_unique(array_column($areas, 'prefecture')), 'empty' => true]);
            echo $this->Form->control('ward', ['class' => 'ward', 'options' => array_column($areas, 'ward'), 'empty' => true]);
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
