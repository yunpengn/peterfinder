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

    	<h1>Service History</h1>

    	<?php if (isset($_SESSION["isOwner"]) && $_SESSION["isOwner"]) { ?>
    	<h3><i>As Pet Owner</i></h3>
    	<br>
        <table id="ownerHistory" class="table table-responsive table-striped display">
		    <thead>
		        <tr>
		            <th>Care Taker</th>
		            <th>Pet Name</th>
		            <th>Start Date</th>
		            <th>End Date</th>
		            <th>Salary</th>
		            <th>Review</th>
		            <th>Rating</th>
                    <th>Add Review</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($ownerHistory as $record) { ?>
		    	<tr>
		            <td><?php echo isset($record["person"]) ? $record["person"] : ""; ?></td>
		            <td><?php echo isset($record["pet_name"]) ? $record["pet_name"] : ""; ?></td>
		            <td><?php echo isset($record["start_date"]) ? formatDate($record["start_date"]) : ""; ?></td>
		            <td><?php echo isset($record["end_date"]) ? formatDate($record["end_date"]) : ""; ?></td>
		            <td><?php echo isset($record["points"]) ? formatMoney($record["points"]) : ""; ?></td>
		            <td><?php echo isset($record["review"]) ? $record["review"] : "N/A"; ?></td>
		            <td><?php echo isset($record["rating"]) ? $record["rating"] : "N/A"; ?></td>
		            <td><a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>/History/reviewForTaker?service_id=<?php echo $record['service_id']; ?>"><i class="far fa-comments"></i></a></td>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<br>
		<?php } ?>

		<?php if (isset($_SESSION["isPeter"]) && $_SESSION["isPeter"]) { ?>
    	<h3><i>As Care Taker</i></h3>
    	<br>
        <table id="takerHistory" class="table table-responsive table-striped display">
		    <thead>
		        <tr>
		            <th>Pet Owner</th>
		            <th>Pet Name</th>
		            <th>Start Date</th>
		            <th>End Date</th>
		            <th>Salary</th>
		            <th>Review</th>
		            <th>Rating</th>
                    <th>Add Review</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($takerHistory as $record) { ?>
		    	<tr>
		            <td><?php echo isset($record["person"]) ? $record["person"] : ""; ?></td>
		            <td><?php echo isset($record["pet_name"]) ? $record["pet_name"] : ""; ?></td>
		            <td><?php echo isset($record["start_date"]) ? formatDate($record["start_date"]) : ""; ?></td>
		            <td><?php echo isset($record["end_date"]) ? formatDate($record["end_date"]) : ""; ?></td>
		            <td><?php echo isset($record["points"]) ? formatMoney($record["points"]) : ""; ?></td>
		            <td><?php echo isset($record["review"]) ? $record["review"] : "N/A"; ?></td>
		            <td><?php echo isset($record["rating"]) ? $record["rating"] : "N/A"; ?></td>
		            <td><a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>/History/reviewForOwner?service_id=<?php echo $record['service_id']; ?>"><i class="far fa-comments"></i></a></td>
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<br>
		<?php } ?>

		<script type="text/javascript">
			$(document).ready(function () {
				$('#ownerHistory').DataTable();
    			$('#takerHistory').DataTable();
			});
		</script>
    </div>
    <br>
</div>
