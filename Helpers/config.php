<?php
session_start();
$CONFIG['token'] = session_id();
ini_set('max_execution_time', 300);
set_time_limit(300);

date_default_timezone_set('Asia/Kolkata');
$CONFIG['current_date_time'] = date('Y-m-d h:i:s');
/*-------Some Basic Details (Global Variables) ---------*/
if (isset($_SESSION['user_id'])) {
    $CONFIG['user_id'] = $_SESSION['user_id'];
}
$CONFIG['full_name'] = "Xtreme Clean and Carpet Care";
$CONFIG['site_name'] = "XCCC";
$CONFIG['site_info'] = "Service Provider";
$CONFIG['site_contact'] = "0000000000";
$CONFIG['site_contact2'] = "";
$CONFIG['site_email'] = "";
$CONFIG['site_logo'] = "";
$CONFIG['white_logo'] = "";
$CONFIG['banner'] = "";
$CONFIG['inst_url'] = "http://127.0.0.1/xtreme-clean";
$CONFIG['inst_type'] = "Service Provider";
$CONFIG['sender_id'] = "";
$CONFIG['noreply_email'] = "";
$CONFIG['auth_key'] = "";
$CONFIG['base_url'] = '';
$CONFIG['app_start_date'] = '2022-12-20';
$CONFIG['app_link'] = 'https://app.breezeway.io/rep/schedule';

/*---------Social Link ----------*/

$CONFIG['facebook'] = 'http://facebook.com/';
$CONFIG['twitter'] = 'http://twitter.com/';
$CONFIG['linkedin'] = 'http://linkedin.com';
$CONFIG['youtube'] = 'http://youtube.com';
$CONFIG['pinterest'] = 'http://pinterest.com';
$CONFIG['instagram'] = 'http://instagram.com/';

$CONFIG['app_name'] = 'Xtreme Clean and Carpet Care 1.0';
$CONFIG['dev_company'] = "Codeflies Technologies Private Limited";
$CONFIG['dev_by'] = "Codeflies";
$CONFIG['dev_url'] = "https://codeflies.com";
$CONFIG['dev_email'] = "info@codeflies.com";
$CONFIG['dev_contact'] = "";


/* Local Configuration */
$CONFIG['host_name'] = 'localhost';
$CONFIG['db_user'] = 'root';
$CONFIG['db_password'] = '';
$CONFIG['db_name'] = 'xstream_service';
$CONFIG['base_url'] = 'https://app.breezeway.io/rep/schedule';

/*-------End of Basic Details ---------*/

extract($CONFIG);
