<?php
if (!hasLogin()) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>Bidding Details</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/Bidding/edit?service_id=<?php echo $service_id; ?>&pet_name=<?php echo $pet_name; ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="provider">Provided By</label>
                    <input type="text" name="provider" class="form-control" id="provider" accesskey="p" tabindex="1" disabled required value="<?php if (isset($provider)) { echo $provider; } ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="pet_name">Pet To Be Taken Care Of</label>
                    <input type="text" name="pet_name" class="form-control" id="pet_name" value=<?php echo $pet_name; ?> disabled required autofocus>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" id="start_date" accesskey="s" tabindex="2" disabled required value="<?php if (isset($start_date)) { echo $start_date; } ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" id="end_date" accesskey="e" tabindex="3" disabled required value="<?php if (isset($end_date)) { echo $end_date; } ?>">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="decision_deadline">Decision Deadline</label>
                    <input type="date" name="decision_deadline" class="form-control" id="decision_deadline" accesskey="d" tabindex="4" disabled required value="<?php if (isset($decision_deadline)) { echo substr($decision_deadline, 0, strpos($decision_deadline, " ")); } ?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="expected_salary">Expected Salary</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="number" min="0.00" step="any" name="expected_salary" class="form-control" id="expected_salary" accesskey="s" tabindex="5" disabled required value="<?php if (isset($expected_salary)) { echo $expected_salary; } ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="bid_point">Current Bidding Point</label>
                <input type="text" name="bid_point" class="form-control" id="bid_point" value=<?php echo $points; ?> required disabled>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="num_of_bidders">Number of Bidders</label>
                    <input type="number" name="num_of_bidders" class="form-control" id="num_of_bidders" value=<?php echo $bidders_info['number']; ?> disabled required>
                </div>

                <div class="form-group col-md-6">
                    <label for="min_max_points">Minimum/Maximum Bidding Points</label>
                    <input type="text" name="min_max_points" class="form-control" id="min_max_points" value=<?php echo $bidders_info['minimum']. "/". $bidders_info['maximum']; ?> disabled required>
                </div>
            </div>

            <div class="form-group">
                <label for="bidding_status">Bidding Status</label>
                <input type="text" name="bidding_status" class="form-control" id="bidding_status" value=<?php echo $status; ?> disabled required>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo APP_URL; ?>/Pet/index" class="btn btn-info">Cancel</a>
        </form>
    </div>
</div>

