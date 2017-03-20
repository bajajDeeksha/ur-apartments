<!DOCTYPE html>
<html lang="en">
    <div class="row  border-bottom white-bg dashboard-header text-center">
        <?= $this->Html->image('/images/logo-transparent.png'); ?>
    </div>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>Apartment Listings</div>
                                </div>
                            </div>
                        </div>
                            <?=
                                $this->Html->link('<div class="panel-footer"><span class="pull-left">View Details</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div></div>', ['controller' => 'Apartments', 'action' => 'index', '_full'=> true], ['escape' => false]);
                            ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Active Users</div>
                                </div>
                            </div>
                        </div>
                        <?=
                            $this->Html->link('<div class="panel-footer"><span class="pull-left">View Details</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div></div>', ['controller' => 'Users', 'action' => 'index', '_full'=> true], ['escape' => false]);
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-handshake-o fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">4</div>
                                    <div>Operators</div>
                                </div>
                            </div>
                        </div>
                        <?=
                            $this->Html->link('<div class="panel-footer"><span class="pull-left">View Details</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div></div>', ['controller' => 'Users', 'action' => 'opindex', '_full'=> true], ['target' => '_blank', 'escape' => false]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="row big-buttons">
                <div class="col-sm-6 big-right">
                        <?= $this->Html->link('Add Apartment', ['controller' => 'Apartments', 'action' => 'add'],['class' => 'button btn btn-primary']); ?>
                </div>
                <div class="col-sm-6 big-left">
                    <?= $this->Html->link('Add User', ['controller' => 'Users', 'action' => 'add'],['class' => 'button btn btn-primary', 'target' => '_blank']); ?>

                </div>
            </div>
        </div>
</html>