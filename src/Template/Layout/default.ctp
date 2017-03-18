<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

    <?= $this->Html->css('plugins/chosen/chosen.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('../font-awesome/css/font-awesome.css') ?>
    <?= $this->Html->css('animate.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('customize.css') ?>
    <?= $this->Html->css('dashboard.css') ?>
    <?= $this->Html->css('plugins/switchery/switchery.css') ?>

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
                            <span class="clear"> <span style="text-align: center;" class="block m-t-xs"> <strong class="font-bold">Kamal Ishikawa</strong>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                                </span>
                                </span>
                            </a>
                    </div>
                    <div class="logo-element">
                        ASC
                    </div>
                </li>
                <li class="active">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-home"></i> <span class="nav-label"> Apartments </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="add_apartment.html">Add Apartments</a></li>
                        <li><a href="">Delete Apartments</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="add_user.html">Add Users</a></li>
                        <li><a href="">Manage Users</a></li>
                    </ul>
                </li>
                <li class="special_link">
                    <a href="test.html"><i class="fa fa-database"></i> <span class="nav-label">View The Website!</span></a>
                </li>
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
                    </li>
                    <li>
                        <a href="login.html">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    <!-- Mainly scripts -->
    <?= $this->Html->script('jquery-2.1.1.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('inspinia.js') ?>
    <?= $this->Html->script('plugins/chosen/chosen.jquery.js') ?>
    <?= $this->Html->script('plugins/metisMenu/jquery.metisMenu.js') ?>
    <?= $this->Html->script('plugins/pace/pace.min.js') ?>
    <?= $this->Html->script('plugins/jquery-ui/jquery-ui.min.js') ?>
    <!-- Switchery -->
    <?= $this->Html->script('plugins/switchery/switchery.js') ?>
    <!-- iCheck -->
    <?= $this->Html->script('plugins/iCheck/icheck.min.js') ?>

    <!--<?= $this->Flash->render() ?>-->
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
        </div>
    </div>
</body>
</html>
