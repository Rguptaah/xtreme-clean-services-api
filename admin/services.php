<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Services</h3>
                </div>
                <div class="col-auto text-right">
                    <a class="btn btn-white btn-primary btn-md text-white" href="add-services.php">
                        Add New Services
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
                                        <th>Title</th>
                                        <th>Service Detail</th>
                                        <th>Images</th>
                                        <th>Created On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $res = get_all('services');
                                    if ($res['count'] > 0) {
                                        foreach ($res['data'] as $row) {
                                            extract($row);
                                    ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $title; ?></td>
                                                <td><?= substr($service_details, 0, 100) . "..."; ?></td>
                                                <td>
                                                    <div class="container">
                                                        <div class="row">
                                                            <?php
                                                            $image_arr = explode(",", $image_gallery);
                                                            $j = 1;
                                                            foreach ($image_arr as $image) :  ?>
                                                                <div class="col-md-4">
                                                                    <img src="<?= $site_url . "/" . $image; ?>" alt="image<?= $j; ?>" style="width=50px;height:50px;">
                                                                </div>
                                                            <?php
                                                                $j++;
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= date('d F Y', strtotime($created_at)); ?></td>
                                                <td><?= strtoupper($status); ?></td>
                                                <td><a href="edit-services.php?id=<?php echo base64_encode($id); ?>"><i class="fa fa-edit fa-fw fa-sm text-primary"></i></a><a style="cursor:pointer" class="delete_btn" data-table="services" data-id="<?= $id; ?>"><i class="fa fa-trash fa-fw fa-sm text-danger"></i></a></td>
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