<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <title><?= $title ?></title>

    <?= $this->Html->css('plugins/chosen/chosen.css') ?>
    <?= $this->Html->css('plugins/footable/footable.css') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('../font-awesome/css/font-awesome.css') ?>
    <?= $this->Html->css('animate.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('customize.css') ?>
    <?= $this->Html->css('dashboard.css') ?>
    <?= $this->Html->css('plugins/switchery/switchery.css') ?>
    <?= $this->Html->css('plugins/toastr/toastr.min.css') ?>

</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span style="text-align: center;" class="block m-t-xs"> <strong class="font-bold"><?= $this->request->session()->read('currentUser')['name']; ?></strong>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?></li>
                            </ul>
                                </span>
                                </span>
                            </a>
                    </div>
                    <div class="logo-element">
                        ASC
                    </div>
                </li>
                <?php if($this->request->session()->read('currentUser')['auth'] > 0): ?>
                <li class="active">
                    <?= $this->Html->link('<i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span>', ['controller' => 'Users', 'action' => 'dashboard'], ['escape' => false]); ?>
                </li>
                <li>
                    <a href="#"><i class="fa fa-home"></i> <span class="nav-label"> Apartments </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?= $this->Html->link('Add apartments', ['controller' => 'Apartments', 'action' => 'add']) ?></li>
                        <li><?= $this->Html->link('View apartments', ['controller' => 'Apartments', 'action' => 'index']) ?></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?= $this->Html->link('Add Users', ['controller' => 'Users', 'action' => 'add']) ?></li>
                        <li><?= $this->Html->link('View User', ['controller' => 'Users', 'action' => 'index']) ?></li>
                    </ul>
                </li>
                <?php else: ?>
                <li>
                    <a href="#"><i class="fa fa-home"></i> <span class="nav-label"> Apartments </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?= $this->Html->link('View apartments', ['controller' => 'Apartments', 'action' => 'index']) ?></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to ASAHI Service Company</span>
                    </li>
                    <li>
                        <?= $this->Html->link('<i class="fa fa-sign-out"></i> Log out', ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?>
                    </li>
                </ul>
            </nav>
        </div>

    <!-- Mainly scripts -->
    <?= $this->Html->script('jquery-2.1.1.js') ?>
    <?= $this->Html->script('lightbox.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('inspinia.js') ?>
    <?= $this->Html->script('plugins/chosen/chosen.jquery.js') ?>
    <?= $this->Html->script('plugins/metisMenu/jquery.metisMenu.js') ?>
    <?= $this->Html->script('plugins/pace/pace.min.js') ?>
    <?= $this->Html->script('plugins/jquery-ui/jquery-ui.min.js') ?>
    <?= $this->Html->script('plugins/toastr/toastr.min.js') ?>
    <!-- Switchery -->
    <?= $this->Html->script('plugins/switchery/switchery.js') ?>
    <!-- iCheck -->
    <?= $this->Html->script('plugins/iCheck/icheck.min.js') ?>
    <!-- footable -->
    <?= $this->Html->script('plugins/footable/footable.js') ?>

        <!--<?= $this->Flash->render() ?>-->
    <div class="clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
        </div>
    </div>
</body>
</html>
