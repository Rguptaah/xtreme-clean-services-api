<?php
require_once('../Helpers/lib.php');
if (isset($_GET['task'])) {
    $task = $_GET['task'];
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }
    switch ($task) {
        case "verify_login":
            extract($_POST);
            $arr = array('email' => $email, 'password' => md5($password), 'role' => 'A');
            $res = get_all('user', '*', $arr);
            if ($res['status'] == 'success' && $res['count'] == 1) {
                $sid = $res['data'][0]['id'];
                $udata = array('token' => $token);
                $result = update_data('user', $udata, $sid, 'id');
                $_SESSION['user_id'] = $sid;
                $_SESSION['user_type'] = $res['data'][0]['role'];
                $_SESSION['user_name'] = trim($email);
                $result['id'] = $sid;
                $result['status'] = 'success';
                $result['msg'] = 'Login Success';
                $result['url'] = 'index.php';
            } else {
                $result['id'] = 0;
                $result['status'] = 'fail';
                $result['msg'] = 'You are not authenticated to login or email and password is wrong';
            }
            echo json_encode($result);
            break;
        case "logout":
            unset($_SESSION['user_id']);
            session_destroy();
            $result['id'] = $user_id;
            $result['status'] = 'success';
            $result['msg'] = "Logout Success...";
            $result['url'] = "login.php";
            echo json_encode($result);
            break;
        case "forget_password":
            $user_email  = $_POST['email'];
            //$user_email  =$_POST['user_email'];
            $result = get_data('user', $user_email, null, 'email');
            //print_r($result);
            $res = $result['data'];
            if ($res['user_id']) {
                $id = $res['id'];
                // $user_email = $res['email'];
                $username = $res['first_name'] . " " . $res['last_name'];
                // $np = rnd_str(6);
                // $up = array('password' => md5($np));
                $res = update_data('user', $up, $id, 'user_id');
                $sms = "Dear " . $user_name . " Your password is " . $np . " Regadrs, " . $inst_name . " " . $inset_url;
                mail($user_email, 'Password Reset Link', $sms, $noreply_email);
                $data['id'] = $id;
                $data['status'] = 'success';
                $data['msg'] = "Your New Password Successfully Send to $user_email";
            } else {
                $data['id'] = 0;
                $data['status'] = 'error';
                $data['msg'] = 'No any user exist with this ID. Try Again';
            }
            echo json_encode($data);
            break;
        case "reset-password":
            $id = $_POST['id'];
            $new1 = $_POST['new_password'];
            $confirm = $_POST['confirm_password'];
            $data['status'] = 'error';
            $data['count'] = 0;
            if ($new1 != $confirm) {
                $data['msg'] = "New Password and Confirm password doesn't match";
            } else {
                $data = update_data('user', array('password' => md5($confirm)), $id);
            }
            echo json_encode($data);
            break;
        case "change-password":
            $id = $_POST['id'];
            $old = $_POST['old_password'];
            $new1 = $_POST['new_password'];
            $confirm = $_POST['confirm_password'];
            $data['status'] = 'error';
            $data['count'] = 0;
            if ($new1 != $confirm) {
                $data['msg'] = "New Password and Confirm password doesn't match";
            } else if ($old == $new1) {
                $data['msg'] = "New Password Current password can't be same";
            } else {
                $data = update_data('user', array('password' => md5($confirm)), $id);
            }
            echo json_encode($data);
            break;

        case "master_delete": // Delete Any Data From Table 
            extract($_POST);
            $res = remove_data($table, $id);
            if (isset($url)) {
                $res['url'] = $url;
            }
            echo json_encode($res);
            break;
        case "add-user":
            unset($_POST['confirm_password']);
            $is_upload = 1;
            $upload_dir = "uploads/";
            if (!empty($_FILES)) {
                $file_name = $_FILES['profile_pic']['name'];
                $file_tmp_name = $_FILES['profile_pic']['tmp_name'];
                $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
                $new_file_name = time() . rand(10000, 99999) . "." . $file_extension;
                $target_file = $upload_dir . $new_file_name;
                if (in_array($file_extension, $allowed_extension)) {
                    if (move_uploaded_file($file_tmp_name, $target_file)) {
                        $_POST['profile_pic'] = $target_file;
                    } else {
                        $is_upload = 0;
                        $res['status'] = "error";
                        $res['msg'] = "File cannot be uploaded.Please Try Again";
                        break;
                    }
                } else {
                    $is_upload = 0;
                    $res['status'] = "error";
                    $res['msg'] = "Sorry! File must be of type (jpg,jpeg,png,gif or webp)";
                    break;
                }
            }
            $res = insert_data('user', $_POST);
            echo json_encode($res);
            break;
        case "edit-user":
            $is_upload = 1;
            $upload_dir = "uploads/";
            if (!empty($_FILES)) {
                $file_name = $_FILES['profile_pic']['name'];
                $file_tmp_name = $_FILES['profile_pic']['tmp_name'];
                $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
                $new_file_name = time() . rand(10000, 99999) . "." . $file_extension;
                $target_file = $upload_dir . $new_file_name;
                if (in_array($file_extension, $allowed_extension)) {
                    if (move_uploaded_file($file_tmp_name, $target_file)) {
                        $_POST['profile_pic'] = $target_file;
                    } else {
                        $is_upload = 0;
                        $res['status'] = "error";
                        $res['msg'] = "File cannot be uploaded.Please Try Again";
                        break;
                    }
                } else {
                    $is_upload = 0;
                    $res['status'] = "error";
                    $res['msg'] = "Sorry! File must be of type (jpg,jpeg,png,gif or webp)";
                    break;
                }
            }
            $res = update_data('user', $_POST, $_POST['id']);
            echo json_encode($res);
            break;
        case "add-task":
            $table_name = "tasks";
            $res = insert_data($table_name, $_POST);
            $res['url'] = 'manage-tasks.php';
            echo json_encode($res);
            break;
        case "edit-task":
            $res = update_data('tasks', $_POST, $_POST['id']);
            echo json_encode($res);
            break;
        case "add-service":
            $table_name = "services";
            $is_upload  = 1;
            $image_arr = [];
            $upload_dir = "uploads/";
            if (!empty($_FILES)) {
                for ($i = 0; $i < count($_FILES['image_gallery']['name']); $i++) {
                    $file_name = $_FILES['image_gallery']['name'][$i];
                    $file_tmp_name = $_FILES['image_gallery']['tmp_name'][$i];
                    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
                    $new_file_name = time() . rand(10000, 99999) . "." . $file_extension;
                    $target_file = $upload_dir . $new_file_name;
                    if (in_array($file_extension, $allowed_extension)) {
                        if (move_uploaded_file($file_tmp_name, $target_file)) {
                            $image_arr[] = $target_file;
                        } else {
                            $is_upload = 0;
                            $res['status'] = "error";
                            $res['msg'] = "File cannot be uploaded.Please Try Again";
                            break;
                        }
                    } else {
                        $is_upload = 0;
                        $res['status'] = "error";
                        $res['msg'] = "Sorry! File must be of type (jpg,jpeg,png,gif or webp)";
                        break;
                    }
                }
                if ($is_upload == 0) {
                    echo json_encode($res);
                } else {
                    $_POST['image_gallery'] = implode(",", $image_arr);
                    $res = insert_data($table_name, $_POST);
                    $res['url'] = 'services.php';
                    echo json_encode($res);
                }
            } else {
                $res['status'] = "error";
                $res['msg'] = "Please choose file for image gallery";
                echo json_encode($res);
            }
            break;
        default:
            echo "Invalid Action";
    }
}
