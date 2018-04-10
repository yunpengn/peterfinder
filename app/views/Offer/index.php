<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
        <div class="row">
    		<div class="col">
    			<h1>Opening Offers</h1>
    		</div>
    		<?php if (isset($_SESSION["isPeter"]) && $_SESSION["isPeter"]) { ?>
    		<div class="col"><div class="float-right">
    			<a role="button" class="btn btn-info" href="<?php echo APP_URL; ?>/Offer/myOffers">View My Offers</a>
				<a role="button" class="btn btn-primary" href="<?php echo APP_URL; ?>/Offer/create">Create New Offer</a>
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
        <?php if (isset($errorMessage)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $errorMessage; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <br>

		<table id="offers" class="table table-responsive table-striped table-bordered display">
		    <thead>
		        <tr>
		            <th>Provider</th>
		            <th>Start Date</th>
		            <th>End Date</th>
		            <th>Decision Deadline</th>
		            <th>Expected Salary</th>
		            <th>Target Pet Types</th>
		            <?php if (isset($_SESSION["isOwner"]) && $_SESSION["isOwner"]) { ?>
		            <th>Action</th>
		            <?php } ?>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($offers as $offer) { ?>
		    	<tr>
		            <td><?php echo isset($offer["provider"]) ? $offer["provider"] : ""; ?></td>
		            <td><?php echo isset($offer["start_date"]) ? formatDate($offer["start_date"]) : ""; ?></td>
		            <td><?php echo isset($offer["end_date"]) ? formatDate($offer["end_date"]) : ""; ?></td>
		            <td><?php echo isset($offer["decision_deadline"]) ? $offer["decision_deadline"] : ""; ?></td>
		            <td><?php echo isset($offer["expected_salary"]) ? formatMoney($offer["expected_salary"]) : ""; ?></td>
		            <td><?php echo isset($offer["target"]) ? $offer["target"] : ""; ?></td>
		            <?php if (isset($_SESSION["isOwner"]) && $_SESSION["isOwner"]) { ?>
		            <td><a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>/Bidding/create?service_id=<?php echo $offer['service_id']; ?>"><i class="fas fa-shopping-cart"></i></a></td>
		        	<?php } ?>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<script type="text/javascript">
			$(document).ready(function () {
    			$('#offers').DataTable();
			});
		</script>
    </div>
</div>
