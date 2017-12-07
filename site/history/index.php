<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/User.php';

$user = User::get_by_id ($_GET['id'] ?? null);

if (!$user) {
    header ("Location: $URL_ROOT/login.php");
    die;
}

if ($user->is_driver) {
    header ("Location: $URL_ROOT/history/driver.php?id=$user->id");
} else {
    header ("Location: $URL_ROOT/history/user.php?id=$user->id");
}
