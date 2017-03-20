<div class="row white-bg dashboard-header">
    <h2 align="center">Add User</h2>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Fill the form with Users' Information</h5>
                </div>
                <div class="ibox-content">
                    <?= $this->Form->create($user, ['class' => 'form-horizontal']); ?>
                        <?php if($this->request->session()->read('currentUser')['auth'] > 1): ?>
                        <div class="form-group" align="right">
                            <label class="control-label"> Is The User an Operator </label>
                            <?= $this->Form->checkbox('auth', ['class' => 'js-switch', 'id' => 'isOperator', 'label' => false]); ?>
                        </div>
                        <?php else: ?>
                        <?= $this->Form->checkbox('auth', ['hidden' => true, 'default' => 0]); ?>
                        <?php endif; ?>
                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <?= $this->Form->control('name', ['class' => 'form-control', 'type' => 'text', 'placeholder' => 'Enter the name', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <?= $this->Form->control('username', ['class' => 'form-control', 'type' => 'text', 'placeholder' => 'Enter the Username', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Password </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <?= $this->Form->control('password', ['class' => 'form-control', 'name' => 'password', 'data-size' => 10, 'type' => 'text', 'data-character-set' => 'a-z,A-Z,0-9,#', 'rel' => 'gp','placeholder' => 'Enter the Password', 'label' => false]); ?>
                                    <span class="input-group-btn">
                                        <?= $this->Form->button('<i class="fa fa-magic" aria-hidden="true"></i>', ['type'=> 'button', 'class' => 'btn btn-primary getNewPass']); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <?= $this->Form->control('email', ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Enter the Email Address', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group" id="dates"><label class="col-sm-2 control-label">Validity</label>
                            <div class="col-sm-10">
                                <select id="validity" data-placeholder="Number of days of Access" name="validity" class="form-control chosen-select" style="width:100%;">
                                    <option value="">number of access days</option>
                                    <option value=3>3 Days</option>
                                    <option value=7>7 Days</option>
                                    <option value=15>15 Days</option>
                                    <option value=25>25 Days</option>
                                    <option value=30>30 Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" align="center">
                            <div class="col-sm-12">
                                <? $this->Form->control('state', ['type' => 'hidden', 'default' => 1, 'value' => 1]); ?>
                                <?= $this->Html->link('Cancel', ['controller' => 'Users', 'action' => 'dashboard']) ?>
                                <?= $this->Form->button('Add User', ['class' => 'btn btn-primary']); ?>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(window).bind("load", function() {
        $('#isOperator').attr('checked',false);
        var elem = document.querySelector('.js-switch');
        var text = new Switchery(elem, {  color: '#1AB394' });
    });
    // chosen-select jQuery
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

    
    
    $('#isOperator').change(function(){
        if($(this).is(":checked")) {
            $("#dates").hide();
            $('#validity_chosen').hide();
        } else {
            $("#dates").show();
            $('#validity_chosen').show();
        }
    });

    // Create a new password
    $(".getNewPass").click(function(){
        var field = $(this).closest('div').find('input[rel="gp"]');
        field.val(randString(field));
    });


    // Generate a password string
    function randString(id){
        var dataSet = $(id).attr('data-character-set').split(',');
        var possible = '';
        if($.inArray('a-z', dataSet) >= 0){
            possible += 'abcdefghijklmnopqrstuvwxyz';
        }
        if($.inArray('A-Z', dataSet) >= 0){
            possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if($.inArray('0-9', dataSet) >= 0){
            possible += '0123456789';
        }
//        if($.inArray('#', dataSet) >= 0){
//            possible += '![]{}()%&*$#^<>~@|';
//        }
        var text = '';
        for(var i=0; i < $(id).attr('data-size'); i++) {
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        }
        return text;
    }
</script>
