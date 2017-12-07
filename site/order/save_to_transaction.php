<?php
	require_once __DIR__ . '/../../app/autoload.php';
	require_once __DIR__ . '/../../app/model/Transaction.php';
	require_once __DIR__ . '/../../app/model/User.php';

	$id = $_POST["id"];
	$picking_point = $_POST["picking_point"];
	$destination = $_POST["destination"];
	$preferred_driver = $_POST["preferred_driver"];
	$driver_id = $_POST["driver_id"];
	$rating = $_POST["rating"];
	$comment = $_POST["comment"];
	
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = new DateTime();
	$newTanggal = $tanggal->format('Y-m-d H:i:s');

	$data_transaction = new Transaction;
	$data_transaction->picking_point = $picking_point;
	$data_transaction->destination = $destination;
	$data_transaction->driver_id = $driver_id;
	$data_transaction->user_id = $id;
	$data_transaction->rating = $rating;
	$data_transaction->order_date = $newTanggal;
	$data_transaction->comment = $comment;
	$data_transaction->show_user_history = 1;
	$data_transaction->show_driver_history = 1;

	$data_transaction->save();
	header("Location: $URL_ROOT/profile/index.php?id=" . $id);
?>