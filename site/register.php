<?php
require_once __DIR__ . '/../app/autoload.php';

require_once __DIR__ . '/../app/model/User.php';

if ($_POST) {
    $user = new User;

    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->full_name = $_POST['full_name'];
    $user->email = $_POST['email'];
    $user->phone_number = $_POST['phone_number'];
    
    $is_driver = $_POST['is_driver'] ? 1 : 0;
    $user->is_driver = $is_driver;

    $user->save ();

    $login = User::get_by_username ($user->username);

    if ($is_driver) {
        header ("Location: $URL_ROOT/profile?id=$login->id");
    } else {
        header ("Location: $URL_ROOT/order?id=$login->id");
    }
}

$data->doc_title = 'Register';

require __DIR__ . '/../app/view/html.view.php';
require __DIR__ . '/../app/view/login/register.view.php';
require __DIR__ . '/../app/view/html_end.view.php';
