<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/Transaction.php';
require_once __DIR__ . '/../../app/model/User.php';

$id = $_POST["id"];
$picking_point = $_POST["picking_point"];
$destination = $_POST["destination"];
$preferred_driver = $_POST["preferred_driver"];
$driver_id = $_GET["id_driver"];
$data_driver = User::get_by_id($driver_id);
$user = User::get_by_id($id);
$data->current_user = $user;

$data->current_tab = 'order';
$data->current_order_tab = 'complete';

require_once __DIR__ . '/../../app/view/html.view.php';
require_once __DIR__ . '/../../app/view/status.view.php';
require_once __DIR__ . '/../../app/view/order/header_view.php';
require_once __DIR__ . '/../../app/view/order/complete_view.php';
require_once __DIR__ . '/../../app/view/html_end.view.php';
?>
