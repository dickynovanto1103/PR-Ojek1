<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/User.php';

$json = new stdClass ();

if (isset ($_GET['username']) && ($username = $_GET['username']) !== '') {
    $obj = User::get_by_username ($username);

    $json->username_valid = !$obj;
}

if (isset ($_GET['email']) && ($email = $_GET['email']) !== '') {
    $obj = User::get_by_email ($email);
    
    $json->email_valid = !$obj;
}

header ('Content-Type: application/json');
echo (json_encode ($json));
?>
