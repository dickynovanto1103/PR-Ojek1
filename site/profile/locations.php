<?php
require_once __DIR__ . '/../../app/autoload.php';
require_once __DIR__ . '/../../app/model/User.php';
require_once __DIR__ . '/../../app/model/Location.php';

$data->current_user = User::get_by_id($_GET['id']);

if($_POST){
	switch ($_GET['action']){
		case 'delete':
			$location = new Location;
			$location->id = intval($_GET['location_id']);
			
			$location->remove();
			break;
		case 'add':
			$location = new Location;
			$location->driver_id = $data->current_user->id;
			$location->name = $_POST['new_name'];
			
			$location->save();
			break;
		case 'edit':
			$location = Location::get_by_id ($_GET['location_id']);
			$location->name = $_POST['name'];
			
			$location->save();
			break;
	}
}

$data->current_tab = 'profile';

require __DIR__ . '/../../app/view/html.view.php';
require __DIR__ . '/../../app/view/status.view.php';
require __DIR__ . '/../../app/view/profile/locations.view.php';
require __DIR__ . '/../../app/view/html_end.view.php';
?>
