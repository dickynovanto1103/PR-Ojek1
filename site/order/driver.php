<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/Transaction.php';
require_once __DIR__ . '/../../app/model/User.php';
require_once __DIR__ . '/../../app/model/Popularity.php';

if($_POST){
	$id = $_POST["id"];
	$picking_point = $_POST["picking_point"];
	$destination = $_POST["destination"];
	$preferred_driver = $_POST["preferred_driver"];

	$driver_id = $_GET["id_driver"];
	//header("Location: $URL_ROOT/order/complete.php?id=".$id."&picking_point=".$picking_point."&destination=".$destination."&preferred_driver=".$preferred_driver. "&driver_id=".$driver_id);
}else{
	$id = $_GET["id"];
	$picking_point = $_GET["picking_point"];
	$destination = $_GET["destination"];
	$preferred_driver = $_GET["preferred_driver"];

}



$data->current_user = User::get_by_id($id);




$data->current_tab = 'order';
$data->current_order_tab = 'driver';

require_once __DIR__ . '/../../app/view/html.view.php';
require_once __DIR__ . '/../../app/view/status.view.php';
require_once __DIR__ . '/../../app/view/order/header_view.php';
require_once __DIR__ . '/../../app/view/order/driver_view.php';
require_once __DIR__ . '/../../app/view/html_end.view.php';
?>
