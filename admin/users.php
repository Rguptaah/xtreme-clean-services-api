<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Users</h3>
                </div>
                <div class="col-auto text-right">
                    <a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
                        <i class="fas fa-filter"></i>
                    </a>
                </div>
            </div>
        </div>


        <div class="card filter-card" id="filter_inputs">
            <div class="card-body pb-0">
                <form>
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>From Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>To Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Created on</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $res = direct_sql("SELECT * from user where status not in('DELETED') order by id DESC");
                                    if ($res['count'] > 0) {
                                        foreach ($res['data'] as $row) {
                                            extract($row);
                                            if ($role == 'A') {
                                                $role = "Admin";
                                            } else if ($role == 'S') {
                                                $role = "Staff";
                                            } else {
                                                $role = "User";
                                            }
                                    ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <?php if (empty($profile_pic)) : ?>
                                                            <a href="#" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="assets/img/customer/user-01.jpg" alt="<?= $firstname . " " . $lastname; ?>">
                                                            </a>
                                                        <?php else : ?>
                                                            <a href="<?= $site_url . "/" . $profile_pic; ?>" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="<?= $site_url . "/" . $profile_pic; ?>" alt="<?= $firstname . " " . $lastname; ?>">
                                                            </a>
                                                        <?php endif; ?>
                                                        <a href="#"><?= $firstname . " " . $lastname; ?></a>
                                                    </h2>
                                                </td>
                                                <td><a href="mailto:<?= $email; ?>"><?= $email; ?></a></td>
                                                <td><?= "<a href='tel:$mobile'>" . $mobile . "</a>"; ?></td>
                                                <td><?= $role; ?></td>
                                                <td><?= $status; ?></td>
                                                <td><?= date('d F Y', strtotime($created_at)); ?></td>
                                                <td><a href="edit-user.php?id=<?php echo base64_encode($id); ?>"><i class="fa fa-edit fa-fw fa-sm text-primary"></i></a><a style="cursor:pointer" class="delete_btn" data-table="user" data-id="<?= $id; ?>"><i class="fa fa-trash fa-fw fa-sm text-danger"></i></a></td>
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