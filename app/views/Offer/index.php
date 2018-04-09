<?php
if (!hasLogin()) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
        <div class="row">
    		<div class="col">
    			<h1>Opening Offers</h1>
    		</div>
    		<?php if (isset($_SESSION["isPeter"]) && $_SESSION["isPeter"]) { ?>
    		<div class="col"><div class="float-right">
				<a role="button" class="btn btn-primary" href="<?php echo APP_URL; ?>/Offer/createOffer">Create New Offer</a>
		    </div></div>
		    <?php } ?>
    	</div>
        <br>
        <?php if (isset($successMessage)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $successMessage; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <br>
        <?php if (isset($_SESSION["isPeter"]) && $_SESSION["isPeter"]) { ?>
        <table id="myOffer" class="table table-responsive table-striped table-bordered display">
		    <thead>
		        <tr>
		            <th>Provider</th>
		            <th>Start Date</th>
		            <th>End Date</th>
		            <th>Decision Deadline</th>
		            <th>Expected Salary</th>
		            <th>Target Pets</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($my_result as $my_offer) { ?>
		    	<tr>
		            <td><?php echo isset($my_offer["provider"]) ? $my_offer["provider"] : ""; ?></td>
		            <td><?php echo isset($my_offer["start_date"]) ? $my_offer["start_date"] : ""; ?></td>
		            <td><?php echo isset($my_offer["end_date"]) ? $my_offer["end_date"] : ""; ?></td>
		            <td><?php echo isset($my_offer["decision_deadline"]) ? $my_offer["decision_deadline"] : ""; ?></td>
		            <td><?php echo isset($my_offer["expected_salary"]) ? $my_offer["expected_salary"] : ""; ?></td>
		            <td><?php echo isset($my_target[$my_offer["service_id"]]) ? $my_target[$my_offer["service_id"]] : ""; ?></td>
		            <td><div class="row">
		            	<a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>/Offer/editOffer?service_id=<?php echo $my_offer["service_id"]; ?>"><i class="far fa-edit"></i></a>&nbsp;
		            	<a role="button" class="btn btn-danger btn-delete-pet" href="<?php echo APP_URL; ?>/Offer/deleteOffer?service_id=<?php echo $my_offer["service_id"]; ?>"><i class="fas fa-trash"></i></a>
		        	</div></td>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<script type="text/javascript">
			$(document).ready(function () {
    			$('#myOffer').DataTable();
			});

			$('.btn-delete-pet').click(function(event) {
				if (!confirm("Are you sure to delete this pet? This cannot be undone.")) {
					event.preventDefault();
				}
			});
		</script>
		<?php } ?>

		<table id="allOffer" class="table table-responsive table-striped table-bordered display">
		    <thead>
		        <tr>
		            <th>Provider</th>
		            <th>Start Date</th>
		            <th>End Date</th>
		            <th>Decision Deadline</th>
		            <th>Expected Salary</th>
		            <th>Target Pets</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($all_result as $all_offer) { ?>
		    	<tr>
		            <td><?php echo isset($all_offer["provider"]) ? $all_offer["provider"] : ""; ?></td>
		            <td><?php echo isset($all_offer["start_date"]) ? $all_offer["start_date"] : ""; ?></td>
		            <td><?php echo isset($all_offer["end_date"]) ? $all_offer["end_date"] : ""; ?></td>
		            <td><?php echo isset($all_offer["decision_deadline"]) ? $all_offer["decision_deadline"] : ""; ?></td>
		            <td><?php echo isset($all_offer["expected_salary"]) ? $all_offer["expected_salary"] : ""; ?></td>
		            <td><?php echo isset($all_target[$all_offer["service_id"]]) ? $all_target[$all_offer["service_id"]] : ""; ?></td>
		            <?php if (isset($_SESSION["isOwner"]) && $_SESSION["isOwner"]) { ?>
		            <td><div class="row">
		            	<a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>"><i class="far fa-edit"></i></a>
		        	</div></td>
		        	<?php } ?>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<script type="text/javascript">
			$(document).ready(function () {
    			$('#allOffer').DataTable();
			});
		</script>
    </div>
</div>

