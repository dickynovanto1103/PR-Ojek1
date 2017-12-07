<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/User.php';

$user = User::get_by_id($_GET['id']);

$path = __DIR__ . '/../../storage/avatar/' . $user->id;

if (!file_exists ($path)) {
    header ("Location: $URL_ROOT/static/default.jpg");
    die;
}

header ('Content-Type: image/jpeg');
echo (file_get_contents ());
