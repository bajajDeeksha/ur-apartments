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
                            })
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
                                        url: "/apartments/getWards",
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
                            })
                        </script>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Prefecture / Ward </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?= $this->Form->control('prefecture', ['class' => 'form-control chosen-select prefecture', 'options' => array_unique(array_column($areas, 'prefecture')), 'onchange'=>"document.getElementById('pref_content').value=this.options[this.selectedIndex].text", 'empty' => true, 'placeholder' => 'Select prefecture', 'label' => false]); ?>
                                        <?= $this->Form->control('selected_pref', ['type' => 'hidden', 'id' => 'pref_content']); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?= $this->Form->control('ward', ['class' => 'form-control chosen-select ward', 'multiple style' => 'width:100%','options' => array_column($areas, 'ward'), 'multiple' => true, 'onchange'=>"document.getElementById('ward_content').value=this.options[this.selectedIndex].text", 'empty' => true, 'placeholder' => 'Select ward', 'label' => false]); ?>
                                        <?= $this->Form->control('selected_ward', ['type' => 'hidden', 'id' => 'ward_content']); ?>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group" style="margin-top: 20px;" align="right">
                                            <label class="control-label"> Enable Deleting options </label>
                                            <?= $this->Form->checkbox('auth', ['class' => 'js-switch', 'id' => 'isDelete', 'label' => false]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" align="center">
                            <div class="col-sm-12">
                                <button id="show" class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
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
                                    <td><?= h($apartment->size) ?></td>
                                    <td><?= h($apartment->rent).' ('.h($apartment->service_fee).')' ?></td>
                                    <td><?= $this->Html->link('Detail', ['controller' => 'Apartments', 'action' => 'view',$apartment->id],['class' => 'button btn btn-primary btn-table-detail']); ?>
                                        <?= $this->Html->link('Delete', ['controller' => 'Apartments', 'action' => 'view',$apartment->id],['class' => 'button btn btn-danger btn-table-delete']); ?> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <script>
                        //iphone type checkbox
                        var elem = document.querySelector('.js-switch');
                        var text = new Switchery(elem, {  color: '#c9302c' });

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
                </div>
            </div>
        </div>
    </div>
</div>