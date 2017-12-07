<div class="profile-container">
	<div class="section-title">
		<h1>EDIT PREFERRED LOCATIONS</h1>
	</div>
	<form method="POST">	
		<div class="edit-location-content-container">
			<table>
				<tr>
					<th id="no">No</th>
					<th id="location">Location</th>
					<th id="action">Actions</th>
				</tr>
				
					<?php 
					$i=1;
					foreach ($data->current_user->locations as $location) { ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><input type="text" id="textbox<?= $i ?>" name="name" value="<?php echo htmlspecialchars($location->name) ?>" disabled="disabled"></input></td>
							<td>
								<input type="submit" name="edit-button" value="&#10000;" data-textbox-id="textbox<?= $i ?>" formaction="?id=<?= $data->current_user->id ?>&location_id=<?= $location->id ?>&action=edit">
								<input type="submit" name="remove-button" onclick="return deleteContent()" value="&#10060;" formaction="?id=<?= $data->current_user->id ?>&location_id=<?= $location->id ?>&action=delete">
							</td>
						</tr>
					<?php $i++;
					} ?>
				
			</table>
		</div>
		<div class="add-new-location-container">
			<div class="section-title">
				<h2>ADD NEW LOCATION:</h2>
			</div>
			<div class="add-new-location">
				<div class="add-text-input">
					<input type="text" name="new_name">
				</div>
				
				<div class="add-button">
					<input type="submit" name="submit" value="ADD" formaction="?id=<?= $data->current_user->id ?>&action=add">
				</div>
			</div>
		</div>
	</form>
	<div class="back-button">
		<a href="index.php?id=<?php echo htmlspecialchars($data->current_user->id) ?>">BACK</a>
	</div>
	<script>
		let editButtons = document.getElementsByName ('edit-button')
		
		let editButtonHandler = function (e) {
			editButtons.forEach (function (dom) {
				document.getElementById (dom.dataset.textboxId).disabled = true
				dom.onclick = editButtonHandler
			})
			
			document.getElementById (e.target.dataset.textboxId).disabled = false
			e.target.onclick = (e) => true
			return false
		}
		
		editButtons.forEach (function (dom) {
			dom.onclick = editButtonHandler
		})
		
		document.getElementsByName ('remove-button').forEach (function (dom) {
			dom.onclick = function (e) {
				return confirm("Are you sure you want to delete this location?")
			}
		})
	</script>
</div>