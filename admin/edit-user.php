<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>
<?php
if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
} else {
    header('location:');
}
$arr = ['id' => $id];
$res = get_all('user', '*', $arr);
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
                    <h3 class="page-title">Edit Users</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="edit-user" method="post" id="edit_user_form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" class="form-control" name="first_name" value="<?= !empty($first_name) ? $first_name : ""; ?>">
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" value="<?= !empty($last_name) ? $last_name : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= !empty($email) ? $email : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Mobile</label>
                                        <input type="tel" class="form-control" name="mobile" value="<?= !empty($mobile) ? $mobile : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Role</label>
                                        <input type="text" class="form-control" name="role" value="<?= !empty($role) ? $role : ""; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <input type="text" class="form-control" name="status" value="<?= !empty($status) ? $status : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm" type="submit" id="edit-user">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>