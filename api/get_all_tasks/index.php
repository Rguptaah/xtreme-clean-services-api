<?php require_once('../../Helpers/lib.php'); ?>
<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Methods: POST');
extract($_POST);
$arr = array('staff_id' => $staff_id);
$result = get_all('tasks', '*', $arr, 'id ASC');
if ($result['count'] >= 1) {
    // foreach ($result['data'] as $row) {
    //     $time_stamp = strtotime($row['check_in']);
    //     $result['data']['timestamp'] = $time_stamp;
    // }
    echo json_encode(['status' => 'success', 'data' => $result['data'], 'result' => 'found']);
} else {
    echo json_encode(array('status' => 'error', 'result' => 'Something went wrong.Please Try Again'));
}
?>