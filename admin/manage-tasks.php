<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Tasks</h3>
                </div>
                <div class="col-auto text-right">
                    <a class="btn btn-white btn-primary btn-md text-white" href="add-tasks.php">
                        Create task
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Staff</th>
                                        <th>Task</th>
                                        <th>Priority</th>
                                        <th>Property Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $res = get_all('tasks');
                                    if ($res['count'] > 0) {
                                        foreach ($res['data'] as $row) {
                                            extract($row);
                                    ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <?php
                                                    $get_user = get_all('user', '*', array('id' => $staff_id));
                                                    if ($get_user['count'] == 1) {
                                                        echo $get_user['data'][0]['first_name'] . " " . $get_user['data'][0]['last_name'];
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $task_detail; ?></td>
                                                <td><?= $priority; ?></td>
                                                <td><?= $property_name; ?></td>
                                                <td><?= $status; ?></td>
                                                <td><a href="edit-task.php?id=<?php echo base64_encode($id); ?>"><i class="fa fa-edit fa-fw fa-sm text-primary"></i></a><a style="cursor:pointer" class="delete_btn" data-table="tasks" data-id="<?= $id; ?>"><i class="fa fa-trash fa-fw fa-sm text-danger"></i></a></td>
                                            </tr>
                                    <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>