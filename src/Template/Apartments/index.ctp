    <div class="row border-bottom white-bg dashboard-header">
        <h2 align="center">Apartments Information</h2>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox-content">
                    <?= $this->Form->create(); ?>
                        <script type="text/javascript" >
                            $(document).ready(function () {
                                $(".ward").chosen({
                                    search_contains: true
                                });
                            });
                        </script>
                        <script type="text/javascript" >
                            $(document).ready(function () {
                                $(".prefecture").chosen({
                                    search_contains: true
                                });

                                $(".prefecture").change(function()
                                {
                                    var prefecture=$(this).find(":selected").text();

                                    $.ajax
                                    ({
                                        type: "POST",
                                        url: "apartments/getWards",
                                        data: prefecture,
                                        cache: false,
                                        success: function(html)
                                        {
                                            $(".ward").html(html);
                                            $(".ward").trigger('chosen:updated');
                                            $(".ward").chosen({
                                                width: "100%",
                                                search_contains: true
                                            });
                                        }
                                    });

                                });
                            });
                        </script>
                        <?php if($search == 0): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Prefecture / Ward </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?= $this->Form->control('prefecture', ['class' => 'form-control chosen-select prefecture', 'options' => array_unique(array_column($areas, 'prefecture')), 'onchange'=>"document.getElementById('pref_content').value=this.options[this.selectedIndex].text", 'empty' => true, 'placeholder' => 'Select prefecture', 'label' => false]); ?>
                                        <?= $this->Form->control('selected_pref', ['type' => 'hidden', 'id' => 'pref_content']); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <select multiple = "multiple" name="ward[]" data-placeholder="Select all the Facilities available" class="form-control chosen-select">
                                            <?php foreach(array_column($areas, 'ward') as $ward): ?>
                                            <option value="<?php echo $ward; ?>"><?php echo $ward; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!--<div class="col-md-6">-->
                                        <!--<?= $this->Form->control('ward', ['class' => 'form-control chosen-select ward', 'multiple style' => 'width:100%','options' => array_column($areas, 'ward'), 'multiple' => true, 'onchange'=>"document.getElementById('ward_content').value=this.options[this.selectedIndex].text", 'empty' => true, 'placeholder' => 'Select ward', 'label' => false]); ?>-->
                                        <!--<?= $this->Form->control('selected_ward', ['type' => 'hidden', 'id' => 'ward_content', 'multiple' => true]); ?>-->
                                    <!--</div>-->
                                    <?php if($this->request->session()->read('currentUser')['auth'] > 0): ?>
                                    <div class="col-xs-12">
                                        <div class="form-group" style="margin-top: 20px;" align="right">
                                            <label class="control-label"> Enable Deleting options </label>
                                            <?= $this->Form->checkbox('auth', ['class' => 'js-switch', 'id' => 'isDelete', 'label' => false]); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" align="center">
                            <div class="col-sm-12">
                                <button id="show" class="btn m-t-md m-b-md btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                        <?php else: ?>
                            <?= $this->Html->link('⬅︎ back to Apartments', ['action' => 'index']); ?>
                            <?php if($this->request->session()->read('currentUser')['auth'] > 0): ?>
                                <div class="col-xs-12">
                                    <div class="form-group" style="margin-top: 20px;" align="right">
                                        <label class="control-label"> Enable Deleting options </label>
                                        <?= $this->Form->checkbox('auth', ['class' => 'js-switch', 'id' => 'isDelete', 'label' => false]); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php $this->Form->end(); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th data-breakpoints="xs sm md">Prefecture</th>
                                <th data-breakpoints="xs sm">Ward</th>
                                <th data-breakpoints="xs sm md">Floor</th>
                                <th data-breakpoints="xs sm md">ModalPlan</th>
                                <th data-breakpoints="xs sm md">Size</th>
                                <th data-breakpoints="xs sm md">Rent</th>
                                <th></th>
                                <th><th/>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($apartments as $apartment): ?>
                                <tr data-expanded="true">
                                    <td><?= h(substr($apartment->area->prefecture,0,3)).'-'.h($apartment->area_id).'-'.h($apartment->id) ?></td>
                                    <td><?= h($apartment->name) ?></td>
                                    <td><?= $apartment->has('area') ? h($apartment->area->prefecture) : '' ?></td>
                                    <td><?= $apartment->has('area') ? h($apartment->area->ward) : '' ?></td>
                                    <td><?= h($apartment->floor) ?></td>
                                    <?php if($apartment->model_plan): ?>
                                    <td><?= h($modelPlan[$apartment->model_plan]) ?></td>
                                    <?php else: ?>
                                    <td></td>
                                    <?php endif; ?>
                                    <td><?= h($apartment->size).'m2' ?></td>
                                    <td><?= h($apartment->rent).' + '.h($apartment->service_fee). ' Yen' ?></td>
                                    <td><?= $this->Html->link('Detail', ['controller' => 'Apartments', 'action' => 'view',$apartment->id],['class' => 'button btn btn-primary btn-table-detail', 'target' => '_blank']); ?></td>
                                    <td> <button type="button" id="delete-button" class="btn btn-danger btn-table-delete"> Delete </button> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div id="confirm" class="modal animate fade-in-right">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h3>Are you sure you want to delete this?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                                <?= $this->Html->link('Delete', ['controller' => 'Apartments', 'action' => 'delete',$apartment->id],['class' => 'button btn btn-danger']); ?>
                            </div>
                        </div>
                    </div>
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
                        
                        $(window).bind("load", function() {
                            $('#isDelete').attr('checked',false);
                            var elem = document.querySelector('.js-switch');
                            var text = new Switchery(elem, {  color: '#c9302c' });
                        });

                        $('#isDelete').change(function(){
                            if($(this).is(":checked")) {
                                $(".btn-table-detail").css('display','none');
                                $(".btn-table-delete").css('display','block');
                            } else {
                                $(".btn-table-detail").css('display','block');
                                $(".btn-table-delete").css('display','none');
                            }
                        });
                        var config = {
                            '.chosen-select'           : {},
                            '.chosen-select-deselect'  : {allow_single_deselect:true},
                            '.chosen-select-no-single' : {disable_search_threshold:10},
                            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                            '.chosen-select-width'     : {width:"95%"}
                        }
                        for (var selector in config) {
                            $(selector).chosen(config[selector]);
                        }
                        //Calling foo-table 
                        $('.table').footable();
                </script>
                <script>
                    $( document ).ready(function() {
                        var flag = "<?php echo $flag; ?>";
                        if (flag == 1) {
                            aptAdded();
                            <?php $this->request->session()->delete('flagApt'); ?>
                        } else if  (flag==2) {
                            aptDeleted();
                            <?php $this->request->session()->delete('flagApt'); ?>
                        } else {
                            console.log("do nothing");
                        }
                        function aptAdded (){
                            setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 6000
                            };
                            toastr.success('Apartment Has Been Added');
                        }, 1300);
                        };
                        function aptDeleted (){
                            setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 6000
                            };
                            toastr.error('Apartment Has Been Deleted');
                        }, 1300);
                        };
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>