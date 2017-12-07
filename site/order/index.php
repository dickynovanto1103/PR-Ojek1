<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/User.php';

$user = User::get_by_id ($_GET['id'] ?? null);

if (!$user) {
    header ("Location: $URL_ROOT/login.php");
    die;
}

header ("Location: $URL_ROOT/order/destination.php?id=$user->id");
