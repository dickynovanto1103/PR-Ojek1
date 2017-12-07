<?php
require_once __DIR__ . '/../app/autoload.php';

require_once __DIR__ . '/../app/model/User.php';

$data->is_login_failed = false;

if ($_POST) {
    $user = User::get_by_username ($_POST['username']);

    if ($user && $user->check_password ($_POST['password'])) {
        header ("Location: $URL_ROOT/profile?id=" . $user->id);
    } else {
        $data->is_login_failed = true;
    }
}

$data->doc_title = 'Login';

require __DIR__ . '/../app/view/html.view.php';
require __DIR__ . '/../app/view/login/login.view.php';
require __DIR__ . '/../app/view/html_end.view.php';
