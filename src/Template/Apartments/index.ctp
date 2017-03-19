    <div class="row  border-bottom white-bg dashboard-header">
        <h2 align="center">Apartments Information</h2>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox-content">
                    <form method="get" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Prefecture / Ward </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select data-placeholder="Select all the Facilities available" name="prefecture" class="form-control chosen-select" style="width:100%;">
                                            <option value="">Select</option>
                                            <option value="United States">United States</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Aland Islands">Aland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select data-placeholder="Select all the Facilities available" class="form-control chosen-select" multiple style="width:100%;">
                                            <option value="">Select</option>
                                            <option value="United States">United States</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Aland Islands">Aland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" align="center">
                            <div class="col-sm-12">
                                <button id="show" class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th data-breakpoints="xs sm">Prefecture</th>
                            <th data-breakpoints="xs sm">Ward</th>
                            <th data-breakpoints="xs sm md">Floor</th>
                            <th data-breakpoints="xs sm md">ModalPlan</th>
                            <th data-breakpoints="xs sm md">Size</th>
                            <th data-breakpoints="xs sm md">Rent</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr data-expanded="true">
                        <?php foreach ($apartments as $apartment): ?>
                            <td><?= h(substr($apartment->area->prefecture,0,3)).'-'.h($apartment->area_id).'-'.h($apartment->id) ?></td>
                            <td><?= h($apartment->name) ?></td>
                            <td><?= $apartment->has('area') ? h($apartment->area->prefecture) : '' ?></td>
                            <td><?= $apartment->has('area') ? h($apartment->area->ward) : '' ?></td>
                            <td><?= h($apartment->floor) ?></td>
                            <td><?= h($apartment->model_plan) ?></td>
                            <td><?= h($apartment->size) ?></td>
                            <td><?= h($apartment->rent).' ('.h($apartment->service_fee).')' ?></td>
                            <td><?= $this->Html->link('Detail', ['controller' => 'Apartments', 'action' => 'view',$apartment->id],['class' => 'button btn btn-primary']); ?>
                            <?= $this->Html->link('Delete', ['controller' => 'Apartments', 'action' => 'view'],['class' => 'button btn btn-danger']); ?>  </td>
                         
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <script>
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