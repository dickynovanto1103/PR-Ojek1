<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/User.php';

$user = User::get_by_id ($_GET['id'] ?? null);

if (!$user) {
    header ("Location: $URL_ROOT/login.php");
    die;
}

if ($_POST) {
    $transaction = Transaction::get_by_id ($_GET['transaction_id']);
    $transaction->show_driver_history = 0;
    $transaction->save ();

    header ("Location: $URL_ROOT/history/driver.php?id=$user->id");
}

$data->current_user = $user;

$data->doc_title = 'Driver History';

$data->current_tab = 'history';
$data->current_history_tab = 'driver';

require __DIR__ . '/../../app/view/html.view.php';
require __DIR__ . '/../../app/view/status.view.php';
require __DIR__ . '/../../app/view/history/header.view.php';
require __DIR__ . '/../../app/view/history/history_driver.view.php';
require __DIR__ . '/../../app/view/html_end.view.php';
?>
