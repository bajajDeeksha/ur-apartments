            <div class="row  border-bottom white-bg dashboard-header">
                <h2 align="center">Operators Information</h2>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox-content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Validity</th>
                                    <th data-breakpoints="xs">Username</th>
                                    <th data-breakpoints="xs sm md">Email-id</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr data-expanded="true">
                                    <td><?= h($user->name) ?></td>
                                    <td><?= date('M d, Y', strtotime(+$user->validity.' day', strtotime(date('M d, Y')))) ?></td>
                                    <td><?= h($user->username) ?></td>
                                    <td><?= h($user->email) ?></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>