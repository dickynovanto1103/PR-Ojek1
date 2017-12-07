<!-- TODO: Page 2. Select Your Driver disini (Dicky) -->

<!-- <form method='POST' action='handle_to_another_page.php'>
	<input type='hidden' value='$driver_id'>
	<input type='button' value='I CHOOSE YOU!'>
	<button onclick="window.location.href="complete.php"">I CHOOSE YOU!</button>
</form> -->
<br>
<div class="box">

<h2>PREFERRED DRIVERS: </h2>
<form method="POST" name="form_select_driver">
	<input type="hidden" name="id" value='<?php echo $id ?>'>
	<input type="hidden" name="picking_point" value='<?php echo $picking_point ?>'>
	<input type="hidden" name="destination" value='<?php echo $destination ?>'>
	<input type="hidden" name="preferred_driver" value='<?php echo $preferred_driver ?>'>
<?php
	//print preferred driver
	
	if($preferred_driver=="null" || $preferred_driver==$data->current_user->username){echo "<p align='center'>Nothing to display :(</p>";}
	else{
		$data_driver = User::get_pickable_drivers($destination, $picking_point);

		foreach($data_driver as $data_each_driver){
			$nama_panjang = $data_each_driver->full_name;
			$username_database = $data_each_driver->username;
			$driver_id = $data_each_driver->id;
			$data_in_driver = $data_each_driver->get_driver_popularity();

			$avg_rating = $data_in_driver->rating;
			$avg_rating = round($avg_rating,1);
			$count_vote = $data_in_driver->vote_count;
			
			
			if($username_database==$preferred_driver && $username_database!=$data->current_user->username){ ?>			
				<div style="display:inline-block;vertical-align: top;" class="square-image">
					<img id="output" src="<?= $data->doc_root ?>/api/avatar.php?id=<?= ($driver_id)?>">
				</div>
				<div class="other-driver-profile-content">
					<div style="display: inline-block;">
						<div class="box">
							<?php
							echo($nama_panjang . "<br>");
							
							echo("
								<span class='color-rating'>
									&#11090 $avg_rating
								</span>
							");
							echo(" (" . $count_vote .  " votes)<br>");
							//create button
							?>	
						</div>
					</div>
				
				
				<div class="submit-button">
					<input type="submit" id="submit-button" formaction="driver.php?id_driver=<?php echo $driver_id ?>" value="I CHOOSE YOU!"><br>
				</div>
				
			<?php
			}
		}
	}
?>
</div>
<br>
<div class="box">
	<h2>OTHER DRIVERS: </h2>
	<?php
		//print other drivers
		$data_driver = User::get_pickable_drivers($destination, $picking_point);
		foreach($data_driver as $data_each_driver){
			$nama_panjang = $data_each_driver->full_name;
			$username_database = $data_each_driver->username;

			$driver_id = $data_each_driver->id;
			$data_in_driver = $data_each_driver->get_driver_popularity();

			
			$avg_rating = ($data_in_driver->rating)?? '-';
			$avg_rating = round($avg_rating,1);
			$count_vote = ($data_in_driver->vote_count)?? '-';
			if($username_database!=$preferred_driver && $username_database!=$data->current_user->username){
				?>
				<div class="other-driver-profile-content">
					<div class="square-image-driver">
						<img id="output" src="<?= $data->doc_root ?>/api/avatar.php?id=<?= ($driver_id)?>">
					</div>
					<div class="driver-info">
						<div class="name-rating-info">
							<p>
							<?php
							echo($nama_panjang);
							?>
							</p>
							<p>
							<?php
							echo("
								<span class='color-rating'>
									&#9734; $avg_rating
								</span>
							");
							echo(" (" . $count_vote .  " votes)<br>");
							//create button
							?>
							</p>
						</div>
						<div class="submit-button">
							<input type="submit" id="submit-button" formaction="driver.php?id_driver=<?php echo $driver_id ?>" value="I CHOOSE YOU!"><br>
						</div>
					</div>
				</div>
				
				
				

			<?php
			}
		}
	?>
</div>

	<input type="submit" id="submit-button" formaction="complete.php?id_driver=<?php echo $_GET["id_driver"]; ?>" value="CONFIRM" onsubmit="return validate()"><br>
</form>

<script type="text/javascript">
	function validate(){
		var driver_id = <?php echo $_GET["id_driver"];?>;
		if(!driver_id){
			alert("Please choose 1 driver first");
		}
		alert(driver_id);
		if(driver_id==null || driver_id==""){
			
			return false;
		}
		return true;
	}
</script>