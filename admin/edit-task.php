<?php
require_once('header.php');
require_once('sidebar.php');
?>
<div class="page-wrapper">
    <div class="container">
        <div class="page-header mt-5">
            <div class="row">
                <div class="col">
                    <h3 class="page-title"> Edit Tasks</h3>
                </div>
                <div class="col-auto text-right">
                    <a class="btn btn-white btn-primary btn-md text-white" href="manage-tasks.php">
                        Manage task
                    </a>
                </div>
            </div>
        </div>
        <?php
        if (isset($_GET['id'])) {
            $task_id = base64_decode($_GET['id']);
        }
        $res = get_all('tasks', '*', array('id' => $task_id));
        if ($res['count'] == 1) {
            foreach ($res['data'] as $row) {
                extract($row);
            }
        }
        ?>
        <form action="edit-task" method="post" id="task_form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="task_detail" class="form-label">Task Detail</label>
                        <input type="hidden" name="id" value="<?= $task_id; ?>">
                        <input type="text" id="task_detail" name="task_detail" class="form-control" value="<?= (!empty($task_detail)) ? $task_detail : ""; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="staff_id" class="form-label">Select Staff</label>
                        <select id="staff_id" name="staff_id" class="form-control">
                            <option value=" " disabled selected> Select Staff</option>
                            <?php
                            $res = get_all('user', '*', array('role' => 'S'));
                            if ($res['count'] > 0) :
                                foreach ($res['data'] as $row) :
                                    extract($row);
                            ?>
                                    <option value="<?= $id; ?>" <?= (!empty($staff_id) && $id == $staff_id) ? "selected" : ""; ?>><?= $first_name . " " . $last_name; ?></option>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="priority" class="form-label">Priority</label>
                        <select type="text" id="priority" name="priority" class="form-control">
                            <?php foreach ($task_priority as $key => $task_priority) : ?>
                                <option value="<?= $key; ?>" <?= ($key == $priority) ? "selected" : ""; ?>><?= $task_priority; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="property_name" class="form-label">Property Name</label>
                        <input type="text" id="property_name" name="property_name" class="form-control" value="<?= (!empty($property_name)) ? $property_name : ""; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control" value="<?= !empty($address) ? $address : ""; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-control">
                            <?php foreach ($task_status as $key => $task_status) : ?>
                                <option value="<?= $key; ?>" <?= ($key == $status) ? "selected" : ""; ?>><?= $task_status; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="check_out" class="form-label">Checkout</label>
                        <?php if (!empty($check_out)) {
                            $date_checkout = date("Y-m-d\TH:i:s", strtotime($check_out));
                        } ?>
                        <input type="datetime-local" id="check_out" name="check_out" class="form-control" value="<?= (!empty($check_out)) ? $date_checkout : "" ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="next_check_in" class="form-label">Next Check-in</label>
                        <?php if (!empty($check_out)) {
                            $date = date("Y-m-d\TH:i:s", strtotime($next_check_in));
                        } ?>
                        <input type="datetime-local" id="next_check_in" name="next_check_in" class="form-control" value="<?= (!empty($next_check_in)) ? $date : ""; ?>">
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
