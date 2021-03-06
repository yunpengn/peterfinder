<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
        <?php if (isset($successMessage)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $successMessage; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <?php if (isset($errorMessage)) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $errorMessage; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>

        <?php if (isset($_SESSION["isPeter"]) && $_SESSION["isPeter"]) { ?>
    	<h1>Opening Biddings</h1>
        <table id="othersBiddings" class="table table-responsive table-striped display">
		    <thead>
		        <tr>
		        	<th>Service ID</th>
		            <th>Bidder</th>
		            <th>Pet Name</th>
		            <th>Start Date</th>
		            <th>End Date</th>
		            <th>Bid Points</th>
                    <th>Status</th>
                    <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($others_bidding as $bid) { ?>
		    	<tr>
		    		<td><?php echo isset($bid["service_id"]) ? $bid["service_id"] : ""; ?></td>
		            <td><?php echo isset($bid["bidder"]) ? $bid["bidder"] : ""; ?></td>
		            <td><?php echo isset($bid["pet_name"]) ? $bid["pet_name"] : ""; ?></td>
                    <td><?php echo isset($bid["start_date"]) ? formatDate($bid["start_date"]) : ""; ?></td>
                    <td><?php echo isset($bid["end_date"]) ? formatDate($bid["end_date"]) : ""; ?></td>
                    <td><?php echo isset($bid["points"]) ? $bid["points"] : ""; ?></td>
		            <td><?php echo isset($bid["status"]) ? $bid["status"] : ""; ?></td>
		            <td><a role="button" class="btn btn-success btn-accept-bidding" href="<?php echo APP_URL; ?>/Bidding/index?service_id=<?php echo $bid["service_id"]; ?>&bidder=<?php echo $bid["bidder"]; ?>&pet_name=<?php echo $bid["pet_name"]; ?>">Accept</a></td>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table><br>
    	<?php } ?>

    	<?php if (isset($_SESSION["isOwner"]) && $_SESSION["isOwner"]) { ?>
    	<div class="row">
    		<div class="col">
    			<h1>My Biddings</h1>
    		</div>
    	</div>
        <br>
        <table id="myBiddings" class="table table-responsive table-striped display" width="100%">
		    <thead>
		        <tr>
		            <th>Provider</th>
		            <th>Start Date</th>
		            <th>End Date</th>
		            <th>Decision Deadline</th>
		            <th>Bid Points</th>
		            <th>Status</th>
                    <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($my_bidding as $bid) { ?>
		    	<tr>
		            <td><?php echo isset($bid["provider"]) ? $bid["provider"] : ""; ?></td>
                    <td><?php echo isset($bid["start_date"]) ? formatDate($bid["start_date"]) : ""; ?></td>
                    <td><?php echo isset($bid["end_date"]) ? formatDate($bid["end_date"]) : ""; ?></td>
                    <td><?php echo isset($bid["decision_deadline"]) ? formatTime($bid["decision_deadline"]) : ""; ?></td>
		            <td><?php echo isset($bid["points"]) ? $bid["points"] : ""; ?></td>
		            <td><?php echo isset($bid["status"]) ? ucfirst($bid["status"]) : ""; ?></td>
		            <td><div class="row">
                        <a role="button" class="btn btn-primary" href="<?php echo APP_URL; ?>/Bidding/listDetails?service_id=<?php echo $bid["service_id"]; ?>&pet_name=<?php echo $bid["pet_name"]; ?>"><i class="fa fa-file"></i></a>&nbsp;
		            	<a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>/Bidding/edit?service_id=<?php echo $bid["service_id"]; ?>&pet_name=<?php echo $bid["pet_name"]; ?>"><i class="far fa-edit"></i></a>&nbsp;
		            	<a role="button" class="btn btn-danger btn-delete-bidding" href="<?php echo APP_URL; ?>/Bidding/delete?service_id=<?php echo $bid["service_id"]; ?>&pet_name=<?php echo $bid["pet_name"]; ?>"><i class="fas fa-trash"></i></a>
		        	</div></td>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<br>
		<?php } ?>

		<script type="text/javascript">
			$(document).ready(function () {
    			$('#othersBiddings').DataTable();
    			$('#myBiddings').DataTable();
			});

			$('.btn-delete-bidding').click(function(event) {
				if (!confirm("Are you sure to delete this bidding? This cannot be undone.")) {
					event.preventDefault();
				}
			});

			$('.btn-accept-bidding').click(function(event) {
				if (!confirm("Are you sure to accept this bidding? This cannot be undone.")) {
					event.preventDefault();
				}
			});
		</script>
    </div>
</div>
