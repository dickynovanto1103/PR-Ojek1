<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/Transaction.php';
require_once __DIR__ . '/../../app/model/User.php';

$data->current_user = User::get_by_id($_GET['id']);
$data->doc_title = '1 Select Destination';
//$data->current_user->username = $user->username;
if($_POST){
	$picking_point = $_POST["picking_point"];
	$destination = $_POST["destination"];
	$preferred_driver = $_POST["preferred_driver"];
	if(empty($preferred_driver)){$preferred_driver="null";}
	//asumsi input sudah lengkap
	header("Location: $URL_ROOT/order/driver.php?id=".$data->current_user->id."&picking_point=".$picking_point."&destination=".$destination."&preferred_driver=".$preferred_driver);
	
}

$data->current_tab = 'order';
$data->current_order_tab = 'destination';

require_once __DIR__ . '/../../app/view/html.view.php';
require_once __DIR__ . '/../../app/view/status.view.php';
require_once __DIR__ . '/../../app/view/order/header_view.php';
require_once __DIR__ . '/../../app/view/order/destination_view.php';
require_once __DIR__ . '/../../app/view/html_end.view.php';
?>