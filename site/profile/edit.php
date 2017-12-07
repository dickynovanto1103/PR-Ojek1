<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/User.php';

$user = User::get_by_id($_GET['id']);

if ($_POST) {
	$path = $_FILES['img_input']['tmp_name'];

	$img = imagecreatefromstring (file_get_contents ($path));
	$img_x = imagesx ($img);
	$img_y = imagesy ($img);

	unlink ($path);

	$img_d = min ($img_x, $img_y);
	$off_x = ($img_x - $img_d) / 2;
	$off_y = ($img_y - $img_d) / 2;

	$img_crop = imagecrop ($img, [
		'x' => $off_x,
		'y' => $off_y,
		'width' => $img_d,
		'height' => $img_d
	]);

	imagejpeg ($img_crop, __DIR__ . '/../../storage/avatar/' . $user->id, 50);
	
	// Handle data.

	$user->full_name = $_POST['full_name'];
	$user->phone_number = $_POST['phone_number'];
	$user->is_driver = isset ($_POST['is_driver']) ? 1 : 0;

	$user->save ();

	header ("Location: $URL_ROOT/profile/index.php?id=$user->id");
}

$data->current_tab = 'profile';
$data->current_user = $user;

require __DIR__ . '/../../app/view/html.view.php';
require __DIR__ . '/../../app/view/status.view.php';
require __DIR__ . '/../../app/view/profile/edit.view.php';
require __DIR__ . '/../../app/view/html_end.view.php';
?>
