<div class="profile-container">
	<div class="profile-title-container">
		<div class="section-title">
			<h1>MY PROFILE</h1>
		</div>
		<div class="edit-button">
			<div><a href="edit.php?id=<?php echo htmlspecialchars($data->current_user->id) ?>">&#10000;</a></div>
		</div>
	</div>
	<div class="profile-content-container">
		<img class="image-circle" src="<?= $data->doc_root ?>/api/avatar.php?id=<?= $data->current_user->id ?>"/>
		<h3>@<?php echo $data->current_user->username ?></h3>
		<div class="profile-information-container">
			<?php echo $data->current_user->full_name ?><br>
			<?php if($data->current_user->is_driver == 1){?>
				Driver | <span id="driver-status">&#9734;<?php echo $data->current_user->driver_popularity->rating ?? '-' ?></span> (<?php echo $data->current_user->driver_popularity->vote_count ?? '-' ?> votes)
			<?php }else{?>
				Non-Driver
			<?php }?><br>
			&#9993; <?php echo $data->current_user->email ?><br>
			&#9743; <?php echo $data->current_user->phone_number ?></p>
		</div>
	</div>
	<div class="location-container">
		<div class="location-title-container">
			<div class="sub-section-title">
				<h2>PREFERRED LOCATIONS:</h2>
			</div>
			<div class="edit-button">
				<div><a href="locations.php?id=<?php echo htmlspecialchars($data->current_user->id)?>">&#10000;</a></div>
			</div>
		</div>
		<div class="list-container">
			<?php $count = 1; ?>
			<?php foreach ($data->current_user->locations as $location) { ?>
			<ul>
				<li><?php echo $location->name ?></li>
			<?php $count = $count+1;} ?>
			
			<?php 
				for ($i = 0; $i < $count; $i++) {
					echo '</ul>';
				} 
			?>
		</div>
	</div>
</div>