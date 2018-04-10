<?php
if (!hasLogin()) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
    	<div class="row">
    		<div class="col">
    			<h1>Opening Biddings</h1>
    		</div>
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
        <table id="othersBiddings" class="table table-responsive table-striped table-bordered display">
		    <thead>
		        <tr>
		            <th>Bidder</th>
		            <th>Start Date</th>
		            <th>End Date</th>
		            <th>Bid Point</th>
                            <th>Status</th>
                            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($others_bidding as $bid) { ?>
		    	<tr>
		            <td><?php echo isset($bid["bidder"]) ? $bid["bidder"] : ""; ?></td>
                            <td><?php echo isset($bid["start_date"]) ? $bid["start_date"] : ""; ?></td>
                            <td><?php echo isset($bid["end_date"]) ? $bid["end_date"] : ""; ?></td>
                            <td><?php echo isset($bid["points"]) ? $bid["points"] : ""; ?></td>
		            <td><?php echo isset($bid["status"]) ? $bid["status"] : ""; ?></td>
		            <td><div class="row">
		            	<a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>/Pet/edit?pet_name=<?php echo $pet['pet_name']; ?>"><i class="far fa-edit"></i></a>&nbsp;
		            	<a role="button" class="btn btn-danger btn-delete-pet" href="<?php echo APP_URL; ?>/Pet/delete?pet_name=<?php echo $pet['pet_name']; ?>"><i class="fas fa-trash"></i></a>
		        	</div></td>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<script type="text/javascript">
			$(document).ready(function () {
    			$('#othersBiddings').DataTable();
			});

			$('.btn-delete-pet').click(function(event) {
				if (!confirm("Are you sure to delete this pet? This cannot be undone.")) {
					event.preventDefault();
				}
			});
		</script>
    </div>
</div>
<br>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
    	<div class="row">
    		<div class="col">
    			<h1>My Biddings</h1>
    		</div>
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
        <table id="myBiddings" class="table table-responsive table-striped table-bordered display">
		    <thead>
		        <tr>
		            <th>Offer Provider</th>
		            <th>Start Date</th>
		            <th>End Date</th>
		            <th>Decision Deadline</th>
		            <th>Bid Point</th>
                            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($my_bidding as $bid) { ?>
		    	<tr>
		            <td><?php echo isset($bid["provider"]) ? $bid["provider"] : ""; ?></td>
                            <td><?php echo isset($bid["start_date"]) ? $bid["start_date"] : ""; ?></td>
                            <td><?php echo isset($bid["end_date"]) ? $bid["end_date"] : ""; ?></td>
                            <td><?php echo isset($bid["decision_deadline"]) ? $bid["decision_deadline"] : ""; ?></td>
		            <td><?php echo isset($bid["points"]) ? $bid["points"] : ""; ?></td>
		            <td><div class="row">
		            	<a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>/Bidding/edit?service_id=<?php echo $bid["service_id"]; ?>"><i class="far fa-edit"></i></a>&nbsp;
		            	<a role="button" class="btn btn-danger btn-delete-bidding" href="<?php echo APP_URL; ?>/Bidding/delete?service_id=<?php echo $bid["service_id"]; ?>"><i class="fas fa-trash"></i></a>
		        	</div></td>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<script type="text/javascript">
			$(document).ready(function () {
    			$('#myBiddings').DataTable();
			});

			$('.btn-delete-bidding').click(function(event) {
				if (!confirm("Are you sure to delete this bidding? This cannot be undone.")) {
					event.preventDefault();
				}
			});
		</script>
    </div>
</div>
<br>

