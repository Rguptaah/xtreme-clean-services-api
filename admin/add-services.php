<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>
<div class="page-wrapper">
    <div class="container">
        <div class="page-header mt-5">
            <div class="row">
                <div class="col">
                    <h3 class="page-title"> Create Services</h3>
                </div>
                <div class="col-auto text-right">
                    <a class="btn btn-white btn-primary btn-md text-white" href="services.php">
                        Manage Service
                    </a>
                </div>
            </div>
        </div>

        <form action="add-service" method="post" id="service_form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="service_details" class="form-label">Service Details</label>
                        <textarea type="text" id="service_details" name="service_details" class="form-control" rows="10" cols="10"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image_gallery" class="form-label">Image Gallery</label>
                        <input type="file" name="image_gallery[]" id="image_gallery" class="form-control" multiple>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-control">
                            <?php foreach ($status as $key => $status) : ?>
                                <option value="<?= $key; ?>"><?= $status; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-md" id="add-service">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once('footer.php'); ?>