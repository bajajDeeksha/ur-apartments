            <div class="row  border-bottom white-bg dashboard-header">
                <h2 align="center">Guest Information</h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                    <?php if (count($users) == 0): ?>
                        <div class="ibox-content">
                            <div class="alert alert-danger text-center">
                                Sorry There are no Active Users currently. Please <?= $this->Html->link('Click Here', ['action' => 'add'], ['class' => 'alert-link']) ?> to Add Users. 
                            </div>
                        </div>
                    <?php else: ?>    
                        <div class="ibox-title">
                            <p style="font-size:16px; font-weight: 600;"> List of Active Users. </p>
                            <p> To go to Operatores Information <?= $this->Html->link('CLICK HERE', ['action' => 'opindex']) ?>  </p>
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
                                    <td> <span type="button" id="delete-button"><i class="fa fa-2x fa-trash"></i></span> </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div id="confirm" class="modal animate fade-in-right">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h3>Are you sure you want to delete this ?</h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                                    <?= $this->Html->link('Delete', ['controller' => 'Users', 'action' => 'delete',$user->id],['class' => 'button btn btn-danger']); ?>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <script>
                $( document ).on('click','#delete-button',function(e) {
                    console.log("hi");
                    var $form = $(this).closest('form');
                    e.preventDefault();
                    console.log("hi1");
                    $('#confirm').modal({
                        keyboard: false
                    })
                    .one('click', '#delete', function(e) {
                        $form.trigger('submit');
                    }); 
                });
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