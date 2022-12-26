<?php
require_once('header.php');
require_once('sidebar.php');
if (empty($_REQUEST)) {
    header("location:services.php");
}
?>
<div class="page-wrapper">
    <div class="container">
        <div class="page-header mt-5">
            <div class="row">
                <div class="col">
                    <h3 class="page-title"> Edit Services</h3>
                </div>
                <div class="col-auto text-right">
                    <a class="btn btn-white btn-primary btn-md text-white" href="services.php">
                        Manage Services
                    </a>
                </div>
            </div>
        </div>
        <?php
        if (isset($_GET['id'])) {
            $task_id = base64_decode($_GET['id']);
        } else {
            header("location:services.php");
        }
        $res = get_all('services', '*', array('id' => $task_id));
        if ($res['count'] == 1) {
            foreach ($res['data'] as $row) {
                extract($row);
            }
        }
        ?>
        <form action="edit-task" method="post" id="task_form">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="hidden" name="id" value="<?= $task_id; ?>">
                        <input type="text" id="title" name="title" class="form-control" value="<?= (!empty($title)) ? $title : ""; ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="service_details" class="form-label">Service Detail</label>
                        <textarea rows="10" cols="10" id="service_details" name="service_details" class="form-control"><?= (!empty($service_details)) ? $service_details : ""; ?></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image_gallery" class="form-label">Change Gallery</label>
                        <input type="file" name="image_gallery[]" id="image_gallery" class="form-control" multiple>
                    </div>
                    <?php if (!empty($image_gallery)) : ?>
                        <div class="row">
                            <?php
                            $image_arr = explode(",", $image_gallery);
                            foreach ($image_arr as $image) : ?>
                                <div class="col-md-4">
                                    <a href="<?= $site_url . "/" . $image; ?>"><img src="<?= $site_url . "/" . $image; ?>" alt="" style="width:100px;height:auto;"></a>
                                    <button type="button" onclick="remove_img(<?= base64_decode($id); ?>)" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-control">
                            <?php foreach ($all_status as $key => $all_status) : ?>
                                <option value="<?= $key; ?>" <?= ($key == $status) ? "selected" : ""; ?>><?= $all_status; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-md" id="add-task">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
require_once('footer.php');
