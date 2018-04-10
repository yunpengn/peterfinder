<?php
if (!hasLogin()) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>Bidding Details</h1>
        <br>
        <form>
            <div class="form-group">
                <label for="provider">Service Provider</label>
                <input type="text" name="provider" class="form-control" id="provider" value=<?php echo $provider; ?> disabled required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" id="start_date" value=<?php echo $start_date; ?> disabled required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" id="end_date" value=<?php echo $end_date; ?> disabled required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label for="decision_deadline">Decision Deadline</label>
                <input type="date" name="decision_deadline" class="form-control" id="decision_deadline" value=<?php echo $decision_deadline; ?> disabled required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label for="expected_salary">Expected Salary</label>
                <input type="number" name="expected_salary" class="form-control" id="expected_salary" value=<?php echo $expected_salary; ?> disabled required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label for="pet_name">Pet To Be Taken Care Of</label>
                <input type="text" name="pet_name" class="form-control" id="pet_name" value=<?php echo $pet_name; ?> disabled required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label for="bid_point">Current Bidding Point</label>
                <input type="text" name="bid_point" class="form-control" id="bid_point" value=<?php echo $points; ?> disabled required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label for="num_of_bidders">Number of Bidders</label>
                <input type="number" name="num_of_bidders" class="form-control" id="num_of_bidders" value=<?php echo $bidders_info['number']; ?> disabled required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label for="min_max_points">Minimum/Maximum Bidding Points</label>
                <input type="text" name="min_max_points" class="form-control" id="min_max_points" value=<?php echo $bidders_info['minimum']. "/". $bidders_info['maximum']; ?> disabled required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label for="bidding_status">Bidding Status</label>
                <input type="text" name="bidding_status" class="form-control" id="bidding_status" value=<?php echo $status; ?> disabled required autofocus>
            </div>
            <br>
            <a role="button" class="btn btn-success" href="<?php echo APP_URL; ?>/Bidding/edit?service_id=<?php echo $service_id; ?>&pet_name=<?php echo $pet_name; ?>">Update</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo APP_URL; ?>/Bidding/index" class="btn btn-info">Back</a>
            <br><br>
        </form>
    </div>
</div>

