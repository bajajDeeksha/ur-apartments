<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">

    <title>Asashi Service Company</title>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('../font-awesome/css/font-awesome.css') ?>
    <?= $this->Html->css('animate.css') ?>
    <?= $this->Html->css('style.css') ?>

</head>
<body id="loginscreen" class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <?= $this->Html->image('/images/logo-gray-transparent.png'); ?>
    </div>
    <?= $this->Form->create(null, ['class' => 'login-box']); ?>
        <div class="form-group">
            <?= $this->Form->input('username',['placeholder' => 'Username', 'class'=> 'form-control', 'label' => false]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('password',['placeholder' => 'Password', 'class'=> 'form-control', 'type' => 'password', 'label' => false]); ?>
        </div>
        <?= $this->Form->button('Login', ['class' => 'btn btn-primary block full-width m-b']); ?>
    <?= $this->Form->end(); ?>
</div>

<!-- Mainly scripts -->
<?= $this->Html->script('jquery-2.1.1.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>

</body>

</html>