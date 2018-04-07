<?php
if (!hasLogin()) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>My Pets</h1>
        <br>
        <table id="myPets" class="table table-responsive table-striped table-bordered display">
		    <thead>
		        <tr>
		            <th>Pet Name</th>
		            <th>Gender</th>
		            <th>Type</th>
		            <th>Birthday</th>
		            <th>Bio</th>
		            <th></th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($pets as $pet) { ?>
		    	<tr>
		            <td><?php echo isset($pet["petname"]) ? $pet["petname"] : ""; ?></td>
		            <td><?php echo isset($pet["gender"]) ? ucfirst($pet["gender"]) : ""; ?></td>
		            <td><?php echo isset($pet["type"]) ? ucfirst($pet["type"]) : ""; ?></td>
		            <td><?php echo isset($pet["birthday"]) ? date_format(date_create($pet["birthday"]), DATE_FORMAT) : ""; ?></td>
		            <td><?php echo isset($pet["bio"]) ? $pet["bio"] : ""; ?></td>
		            <td><button type="button" class="btn btn-success">
		            	<i class="far fa-edit"></i>
		            </button></td>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<script type="text/javascript">
			$(document).ready(function () {
    			$('#myPets').DataTable();
			});
		</script>
    </div>
</div>

