<?php require_once('../../Helpers/lib.php'); ?>
<?php
header('Content-Type:application/json');
// header('Access-Control-Allow-Methods: POST');
// require_once("../../vendor/autoload.php");
// use Firebase\JWT\JWT;
// use Firebase\JWT\Key;
extract($_POST);
$arr = array('email' => $email, 'password' => md5($password));
$result = get_all('user', '*', $arr);
if ($result['count'] == 1) {
    $key = 'ABXND123409567578567856786SDGDFHGGJFHHDJIGHI';
    $payload = [
        'iss' => 'http://127.0.0.1/xstream-services/'
        'id' => $result['data'][0]['id'],
        'name' => $result['data'][0]['first_name'],
        'email' => $result['data'][0]['email'],
        'exp' => time()+3600
    ];
    // $jwt = JWT::encode($payload, $key, 'HS256'); 
    echo json_encode(['status' => 'success', 'data' => $result['data'][0], 'result' => 'found']);
} 
else {
    echo json_encode(array('status' => 'error', 'result' => $_SERVER['REQUEST_METHOD']));
}
?>