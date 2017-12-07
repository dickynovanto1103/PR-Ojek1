<br>
<div class="outer-box">
	<div class="order-form">
		<form method="POST" name="form_order" onsubmit="return validate()">
			<p>Picking Point &emsp;&emsp;&emsp;<input type="text" name="picking_point"></p>
			<p>Destination &emsp;&emsp;&emsp;&ensp;&nbsp;<input type="text" name="destination"></p>
			<p>Preffered Driver &emsp;&ensp;&nbsp;<input type="text" name="preferred_driver" placeholder="(optional)"> </p>
			<div class="next-button"><input type="submit" id="next-button" value="NEXT"></div>
		</form>
	</div>
</div>

<script type="text/javascript">
	function validate(){
		var picking_point = document.forms["form_order"]["picking_point"].value;
		var destination = document.forms["form_order"]["destination"].value;
		if(picking_point==null || picking_point=="", destination==null || destination==""){
			alert("Please fill all the required");
			return false;
		}
		return true;
	}
</script>

