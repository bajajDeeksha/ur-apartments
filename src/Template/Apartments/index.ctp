    <div class="row  border-bottom white-bg dashboard-header">
        <h2 align="center">Apartments Information</h2>
    </div>
    <div method="get" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">Prefecture</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-md-6">
                        <select data-placeholder="Select all the Facilities available" name="prefecture" class="form-control chosen-select" style="width:100%;">
                            <option value="">Select</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                        </select>
                    </div>
                    </div>
                </div>
            <div class="form-group" align="right">
            <div class="row">
                <label class="col-sm-2 control-label">Ward</label>
                    <div class="col-md-6">
                        <select data-placeholder="Select all the Facilities available" class="form-control chosen-select">
                            <option value="">Select</option>
                            <option value="United States">United States</option>
                        </select>
                    </div>
                </div>
            </div>
    <div class="form-group" align="center">
        <div class="col-sm-12">
            <button id="show" class="btn btn-primary" type="submit">Search</button>
        </div>
    </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                        <tr>
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
                        <?php foreach ($apartments as $apartment): ?>
                        <tr data-expanded="true">
                            <td><?= h($apartment->name) ?></td>
                            <td><?= $apartment->has('area') ? h($apartment->area->prefecture) : '' ?></td>
                            <td><?= $apartment->has('area') ? h($apartment->area->ward) : '' ?></td>
                            <td><?= h($apartment->floor) ?></td>
                            <td><?= h($apartment->model_plan) ?></td>
                            <td><?= h($apartment->size) ?></td>
                            <td><?= h($apartment->rent).' ('.h($apartment->service_fee).')' ?></td>
                            <td><?= $this->Html->link('Detail', ['controller' => 'Apartments', 'action' => 'view', $apartment->id]) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>