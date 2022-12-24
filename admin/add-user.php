<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Add/Edit Admin</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        $arr = array('id' => $user_id);
        $res = get_all('user', '*', $arr);
        $count = null;
        if ($res['count'] > 0) {
            $count = $res['count'];
            foreach ($res['data'] as $row) {
                $row['count'] = $count;
                extract($row);
            }
        }
        echo $count;
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="fname" class="form-control" value="<?= !empty($first_name) ? $first_name : ""; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="lname" class="form-control" value="<?= !empty($last_name) ? $last_name : ""; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= !empty($email) ? $email : ""; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="tel" name="mobile" id="mobile" class="form-control" value="<?= !empty($mobile) ? $mobile : ""; ?>">
                    </div>
                </div>
                <?php if (empty($count)) : ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="text" name="confirm_password" id="confirm_password" class="form-control">
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="profile_pic" class="form-label">Add Profile Pic</label>
                        <input type="file" name="profile_pic" id="profile_pic" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-control">
                            <?php foreach ($role as $key => $role) : ?>
                                <option value="<?= $key; ?>"><?= $role; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <?php foreach ($status as $key => $status) : ?>
                                <option value="<?= $key; ?>"><?= $status; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm" id="add-user">Save</button>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php require_once('footer.php'); ?>