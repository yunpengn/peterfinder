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
    	<br>
        <table id="history" class="table table-responsive table-striped display">
		    <thead>
		        <tr>
		        	<?php if (isset($_SESSION["isOwner"]) && $_SESSION["isOwner"]) { ?>
		            <th>Care Taker</th>
		            <?php } else { ?>
		            <th>Pet Owner</th>
		            <?php } ?>
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
		    	<?php foreach ($history as $record) { ?>
		    	<tr>
		            
		        </tr>
		    	<?php } ?>
		    </tbody>
		</table>
		<script type="text/javascript">
			$(document).ready(function () {
    			$('#history').DataTable();
			});
		</script>
    </div>
    <br>
</div>
