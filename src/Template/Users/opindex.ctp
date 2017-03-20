            <div class="row  border-bottom white-bg dashboard-header">
                <h2 align="center">Operators Information</h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox-title">
                            <p style="font-size:16px; font-weight: 600;"> List of Active Operators. </p>
                            <p> To go to Users Information <a href=""> CLICK HERE </a> 
                            <p Style="color: #cc0000;"> PLease note there would be no confimation popup when you click on Trash Button, User would be permanently deleted. </p>
                        </div>
                        <div class="ibox-content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Validity</th>
                                    <th data-breakpoints="xs">Username</th>
                                    <th data-breakpoints="xs sm md">Email-id</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr data-expanded="true">
                                    <td><?= h($user->name) ?></td>
                                    <td><?= date('M d, Y', strtotime(+$user->validity.' day', strtotime(date('M d, Y')))) ?></td>
                                    <td><?= h($user->username) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td><?= $this->Html->link('', ['controller' => 'Users', 'action' => 'delete',$user->id],['class' => 'fa fa-2x fa-trash']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <script>
                                //Calling foo-table 
                                $('.table').footable();
                            </script>
                        </div>
                    </div>
                </div>
            </div>