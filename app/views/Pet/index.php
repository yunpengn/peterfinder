<?php
if (!hasLogin()) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    	<div class="row">
    		<div class="col">
    			<h1>My Pets</h1>
    		</div>
    		<div class="col"><div class="float-right">
				<a role="button" class="btn btn-primary" href="<?php echo APP_URL; ?>/Pet/new">Add New Pet</a>
		    </div></div>
    	</div>
        <?php if (isset($successMessage)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $successMessage; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <br>
        <table id="myPets" class="table table-responsive table-striped table-bordered display">
		    <thead>
		        <tr>
		            <th>Pet Name</th>
		            <th>Gender</th>
		            <th>Type</th>
		            <th>Birthday</th>
		            <th>Bio</th>
		            <th class="nosort">Edit</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($pets as $pet) { ?>
		    	<tr>
		            <td><?php echo isset($pet["pet_name"]) ? $pet["pet_name"] : ""; ?></td>
		            <td><?php echo isset($pet["gender"]) ? ucfirst($pet["gender"]) : ""; ?></td>
		            <td><?php echo isset($pet["type"]) ? ucfirst($pet["type"]) : ""; ?></td>
		            <td><?php echo isset($pet["birthday"]) ? date_format(date_create($pet["birthday"]), DATE_FORMAT) : ""; ?></td>
		            <td><?php echo isset($pet["bio"]) ? $pet["bio"] : ""; ?></td>
		            <td><a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>/Pet/edit?pet_name=<?php echo $pet['pet_name']; ?>">
		            	<i class="far fa-edit"></i>
		            </a></td>
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
