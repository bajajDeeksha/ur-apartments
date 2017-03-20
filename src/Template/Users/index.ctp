            <div class="row  border-bottom white-bg dashboard-header">
                <h2 align="center">Guest Information</h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                    <?php if (count($users) == 0): ?>
                        <div class="ibox-content">
                            <div class="alert alert-danger text-center">
                                Sorry There are no Active Users currently. Please <a class="alert-link" href="#">Click Here</a> to Add Users. 
                            </div>
                        </div>
                    <?php else: ?>    
                        <div class="ibox-title">
                            <p style="font-size:16px; font-weight: 600;"> List of Active Users. </p>
                            <p> To go to Operatores Information <a href=""> CLICK HERE </a> 
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
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <script>
                                var flag = "<?php echo $flag; ?>";
                                    if (flag == 1) {
                                        operatorAdded();
                                        <?php $this->request->session()->delete('flag'); ?>
                                    } else if  (flag == 2) {
                                        operatorDeleted();
                                        <?php $this->request->session()->delete('flag'); ?>
                                    } else {
                                        console.log("do nothing");
                                    }
                                function operatorAdded (){
                                    setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 6000
                                    };
                                    toastr.success('User Has Been Added');
                                }, 1300);
                                };
                                function operatorDeleted (){
                                    setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 6000
                                    };
                                    toastr.error('User Has Been Deleted');
                                }, 1300);
                                };
                                //Calling foo-table 
                                $('.table').footable();
                            </script>