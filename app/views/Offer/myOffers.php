<?php
if (!hasLogin() || !(isset($_SESSION["isPeter"]) && $_SESSION["isPeter"])) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
        <div class="row">
    		<div class="col">
    			<h1>My Offers</h1>
    		</div>
    		<div class="col"><div class="float-right">
    			<a role="button" class="btn btn-info" href="<?php echo APP_URL; ?>/Offer/index">View All Offers</a>
				<a role="button" class="btn btn-primary" href="<?php echo APP_URL; ?>/Offer/create">Create New Offer</a>
		    </div></div>
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

        <table id="myOffers" class="table table-responsive table-striped table-bordered display">
		    <thead>
		        <tr>
		            <th>Provider</th>
		            <th>Start Date</th>
		            <th>End Date</th>
		            <th>Decision Deadline</th>
		            <th>Expected Salary</th>
		            <th>Target Pets</th>
		            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($offers as $offer) { ?>
		    	<tr>
		            <td><?php echo isset($offer["provider"]) ? $offer["provider"] : ""; ?></td>
		            <td><?php echo isset($offer["start_date"]) ? formatDate($offer["start_date"]) : ""; ?></td>
		            <td><?php echo isset($offer["end_date"]) ? formatDate($offer["end_date"]) : ""; ?></td>
		            <td><?php echo isset($offer["decision_deadline"]) ? $offer["decision_deadline"] : ""; ?></td>
		            <td><?php echo isset($offer["expected_salary"]) ? $offer["expected_salary"] : ""; ?></td>
		            <td><?php echo isset($offer["target"]) ? $offer["target"] : ""; ?></td>
		            <td><div class="row">
		            	<a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>/Offer/edit?service_id=<?php echo $offer['service_id']; ?>"><i class="far fa-edit"></i></a>&nbsp;
		            	<a role="button" class="btn btn-danger btn-delete-offer" href="<?php echo APP_URL; ?>/Offer/delete?service_id=<?php echo $offer['service_id']; ?>"><i class="fas fa-trash"></i></a>
		        	</div></td>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<script type="text/javascript">
			$(document).ready(function () {
    			$('#myOffers').DataTable();
			});

			$('.btn-delete-offer').click(function(event) {
				if (!confirm("Are you sure to delete this offer? This cannot be undone.")) {
					event.preventDefault();
				}
			});
		</script>
    </div>
</div>
