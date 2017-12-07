<!-- TODO: Halaman edit profile (Roland) -->
<div class="edit-profile-container">
	<div class="section-title">
		<h1>EDIT PROFILE INFORMATION</h1>
	</div>
	
	<div class="update-profile-picture-container">
		<form id="upload-picture" action="edit.php?id=<?php echo htmlspecialchars($data->current_user->id) ?>" method="post" enctype="multipart/form-data">
			<div class="upload-picture-container">
				<div class="square-image">
					<img id="output" src="<?= $data->doc_root ?>/api/avatar.php?id=<?= ($data->current_user->id)?>">
				</div>
				<div class="uploader">
					<label for="img_input">Update profile picture</label><br>
					<div class="img-file-input">
						<input type="file" class="file" name="img_input" id="img_input" onchange="loadFile(event); fileNameGetter();"/>
						<div class="dummy">
							<input id="fake-input"/>
							<div >
								<p>Choose file</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="edit-name-phone-container">
			<ul>
				<li>
					<label for="full_name">Your Name</label>
					<input type="text" name="full_name" value="<?php echo htmlspecialchars($data->current_user->full_name)?>">
				</li>
				<li>
					<label for="phone_number">Phone Number</label>
					<input type="text" name="phone_number" value="<?php echo htmlspecialchars($data->current_user->phone_number)?>">
				</li>
				<li>
					<label for="is_driver">Status Driver</label>
					<label class="driver-status-switch">
					  <input type="checkbox" name="is_driver" <?php if($data->current_user->is_driver == 1){?>checked<?php }?>>
					  <span class="slider round"></span>
					</label>
				</li>
			</ul>
			</div>
			<div class="back-save-buttons">
				<div class="back-button">
					<a href="index.php?id=<?php echo htmlspecialchars($data->current_user->id) ?>">BACK</a>
				</div>
				<div class="save-button">
					<input type="submit" value="SAVE" name="submit">
				</div>
				
			</div>
			<script >
				function loadFile(event) {
					var reader = new FileReader();
					reader.onload = function(){
						var output = document.getElementById('output');
						output.src = reader.result;
					};
					reader.readAsDataURL(event.target.files[0]);
				};
				function fileNameGetter(){
					var fileinput = document.getElementById('img_input');
					var targetfield = document.getElementById('fake-input');
					targetfield.value = fileinput.value;
				};
			</script>
		</form>
	</div>
	<div class="location-container">
		
	</div>
</div>