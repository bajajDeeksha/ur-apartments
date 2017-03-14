<div class="row  border-bottom white-bg dashboard-header">
    <h2 align="center">Add Apartment</h2>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Fill the form with Apartment Information</h5>
                </div>
                <div class="ibox-content">
                        <?= $this->Form->create($apartment, ['class' => 'form-horizontal']); ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <?= $this->Form->control('name', ['class' => 'form-control', 'type' => 'text', 'placeholder' => 'Enter the name of the building', 'label' => false]); ?>
                                </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                                <?= $this->Form->control('address', ['class' => 'form-control', 'type' => 'text', 'placeholder' => 'Enter the address', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Prefecture / Ward </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6">
                                            <?= $this->Form->control('prefecture', ['class' => 'form-control chosen-select prefecture', 'options' => array_unique(array_column($areas, 'prefecture')), 'empty' => true, 'placeholder' => 'Select prefecture', 'label' => false]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?= $this->Form->control('ward', ['class' => 'form-control chosen-select ward', 'options' => array_column($areas, 'ward'), 'empty' => true, 'placeholder' => 'Select ward', 'label' => false]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Floor </label>
                            <div class="col-sm-10">
                                <?= $this->Form->control('floor', ['class' => 'form-control', 'min' => 1, 'type' => 'number', 'placeholder' => 'Floor', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label"> Size </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <?= $this->Form->control('size', ['class' => 'form-control', 'min' => 0, 'type' => 'number', 'placeholder' => 'Enter the size in m2', 'label' => false]); ?>
                                    <span class="input-group-addon">Meter Square</span></div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label"> Modal Plan </label>
                            <div class="col-sm-10">
                                <?= $this->Form->control('model_plan', ['class' => 'form-control chosen-select', 'options' => $model, 'empty' => true, 'placeholder' => 'Select modal plan', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label"> Rent </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <?= $this->Form->control('rent', ['class' => 'form-control', 'min' => 0, 'type' => 'number', 'placeholder' => 'Enter the rent in yen', 'label' => false]); ?>
                                    <span class="input-group-addon">Yen</span></div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label"> Service Fees </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <?= $this->Form->control('service_fee', ['class' => 'form-control', 'min' => 0, 'type' => 'number', 'placeholder' => 'Enter the service fee in yen', 'label' => false]); ?>
                                    <span class="input-group-addon">Yen</span></div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label"> Distance Information </label>
                            <div class="col-sm-10">
                                <?= $this->Form->control('traffic', ['class' => 'form-control', 'placeholder' => 'Enter the distance information from different stations.', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Facilities</label>
                            <div class="col-sm-10">
                                <div>
                                    <?= $this->Form->control('facilities', ['class' => 'form-control chosen-select', 'tabindex' => 4, 'multiple style' => 'width:100%;', 'options' => $facilities, 'empty' => true, 'placeholder' => 'Select facilities', 'label' => false]); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label"> Remarks </label>
                            <div class="col-sm-10">
                                <?= $this->Form->control('remarks', ['class' => 'form-control', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group" align="center">
                            <div class="col-sm-12">
                                <?= $this->Html->link('Cancel', ['controller' => 'Users', 'action' => 'dashboard']) ?>
                                <?= $this->Form->button('Save changes', ['class' => 'btn btn-primary', 'name' => 'save']); ?>
                            </div>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<!-- iCheck -->
<?= $this->Html->script('plugins/iCheck/icheck.min.js') ?>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });


    var linestart = function(txt, st) {
        var ls = txt.split("\n");
        var i = ls.length-1;
        ls[i] = st+ls[i];
        return ls.join("\n");
    };
    $('textarea').on('keydown', function(e) {
        var t = $(this);
        if(e.which == 13) {
            t.val(linestart(t.val(), '•') + "\n");
            return false;
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
</script>