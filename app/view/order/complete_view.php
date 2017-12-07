<!-- TODO: Page 3. Complete Your Order disini (Dicky) -->

<h2>HOW WAS IT?</h2>
<div class="profile-info">
	<img class="image-circle" src="<?= $data->doc_root ?>/api/avatar.php?id=<?= $driver_id ?>"/>
	<div class="user-name">
		<?php echo ("<strong>@$data_driver->username</strong>") ?>
	</div>
	<div class="full-name"><?php echo $data_driver->full_name ?></div>
</div>

	
	<!-- memasukkan rating dan comment -->
	<form method="POST" name="form_comment_rating" action="save_to_transaction.php" onsubmit="return validate()">
		<div class="rating-comment">
			<div class="rating-box">
				
				<input type="hidden" name="id" value='<?php echo $id ?>'>
				<input type="hidden" name="picking_point" value='<?php echo $picking_point ?>'>
				<input type="hidden" name="destination" value='<?php echo $destination ?>'>
				<input type="hidden" name="preferred_driver" value='<?php echo $preferred_driver ?>'>
				<input type="hidden" name="driver_id" value='<?php echo $driver_id ?>'>
				<label for="rating-input">Enter your rating: </label>
				<input class="rating-input" type="number" name="rating" align="center"><br><br>
			</div>
			<div class="comment-box">
				<div class="comment-box-input">
					<!--input type="type" name="comment" placeholder="Your comment..."-->
					<textarea rows="4" cols="92" name="comment">Your comment...</textarea>
				</div>
				<div class="comment-box-button">
					<input type="submit" value="COMPLETE ORDER">
				</div>
			</div>
		</div>
	</form>

<script type="text/javascript">
	function validate(){
		var rating = document.forms["form_comment_rating"]["rating"].value;
		var comment = document.forms["form_comment_rating"]["comment"].value;
		if(rating==null || rating=="", comment==null || comment==""){
			alert("Please fill all the required");
			return false;
		}
		if(rating<0 || rating>5){
			alert("Rating must be between 0 and 5");
			return false;
		}
		return true;
	}
</script>