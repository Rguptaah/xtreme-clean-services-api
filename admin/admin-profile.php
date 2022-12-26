<?php require_once('header.php'); ?>


<?php require_once('sidebar.php'); ?>

<?php
$res = direct_sql("SELECT * FROM user where id = $user_id and role = 'A'");
if ($res['count'] == 1) {
    foreach ($res['data'] as $row) {
        extract($row);
    }
}
?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <?php if (empty($profile_pic)) : ?>
                                <a href="#">
                                    <img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
                                </a>
                            <?php else : ?>
                                <a href="<?= $site_url . "/" . $profile_pic; ?>">
                                    <img class="img-fluid rounded-circle" alt="User Image" src="<?= $site_url . "/" . $profile_pic; ?>" style="width:100px;height:100px;">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0"><?= $first_name . " " . $last_name; ?></h4>
                            <h6 class="text-muted"><?= "Admin"; ?></h6>
                            <div class="user-Location"><i class="fas fa-map-marker-alt"></i><?= !empty($address) ? $address : ""; ?></div>
                        </div>
                        <div class="col-auto profile-btn">
                            <a class="btn btn-primary" href="edit-user.php?id=<?php echo base64_encode($id); ?>"><i class="fa fa-edit fa-sm fa-fw"></i></a>
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="per-details-tab" data-bs-toggle="tab" data-bs-target="#per_details_tab" type="button" role="tab" aria-controls="per_details_tab" aria-selected="true">About</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password_tab" type="button" role="tab" aria-controls="password_tab" aria-selected="false">Password</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <div class="tab-pane fade show active" id="per_details_tab">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-end mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-9"><?= ucfirst($first_name) . " " . ucfirst($last_name); ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-end mb-0 mb-sm-3">Role</p>
                                            <p class="col-sm-9">
                                                <?php if ($role == "A") {
                                                    echo "Admin";
                                                } else if ($role == "S") {
                                                    echo "Staff";
                                                } else {
                                                    echo "Customer";
                                                } ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-end mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-9"><?= "<a href='mailto:$email'>" . $email . "</a>"; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-end mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-9"><?= "<a href='tel:$mobile'>" . $mobile . "</a>"; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-end mb-0 mb-sm-3">Address</p>
                                            <p class="col-sm-9"><?= !empty($address) ? $address : "Not given yet"; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-end mb-0">Status</p>
                                            <p class="col-sm-9 mb-0"><?= !empty($status) ? $status : ""; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="password_tab">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action="change-password" method="POST" id="change_password_form">
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="hidden" name="id" id="id" value="<?= $id; ?>">
                                                <input type="password" name="old_password" class="form-control" id="old_password">
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="new_password" class="form-control" id="new_password">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                                            </div>
                                            <button class="btn btn-primary" type="submit" id="change-password">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php require_once('footer.php'); ?>