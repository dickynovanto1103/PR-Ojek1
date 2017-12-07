<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/User.php';

$data->current_user = User::get_by_id($_GET['id']);

$data->current_tab = 'profile';

require __DIR__ . '/../../app/view/html.view.php';
require __DIR__ . '/../../app/view/status.view.php';
require __DIR__ . '/../../app/view/profile/profile.view.php';
require __DIR__ . '/../../app/view/html_end.view.php';
?>
