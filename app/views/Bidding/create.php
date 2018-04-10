<div class="container">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>New Bidding</h1>
        <br>
        <?php if (isset($errorMessage)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $errorMessage; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <br>
        <?php } ?>

        <h3>Service Offer Information</h3>
        <form>
            <div class="form-group">
                <label for="provider">Provided By</label>
                <input type="text" name="provider" class="form-control" id="provider" accesskey="p" tabindex="1" disabled required value="<?php if (isset($provider)) { echo $provider; } ?>">
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
        </form>
        <br>

        <?php if (isset($info)) { ?>
        <h3>Bidding Statistics</h3>
        <table class="table table-responsive table-striped">
            <thead><tr>
                <td>Number of Bidders</td>
                <td>Min. Bidding Points</td>
                <td>Max. Bidding Points</td>
            </tr></thead>
            <tbody><tr>
                <td><?php echo isset($info["number"]) ? $info["number"] : "Unknown"; ?></td>
                <td><?php echo isset($info["minimum"]) ? $info["minimum"] : "Unknown"; ?></td>
                <td><?php echo isset($info["maximum"]) ? $info["maximum"] : "Unknown"; ?></td>
            </tr></tbody>
        </table>
        <br>
        <?php } ?>

        <h3>Enter Your Bidding</h3>
        <form method="post" action="<?php echo APP_URL; ?>/Bidding/create?service_id=<?php echo $_GET['service_id']; ?>" id="create-bidding">
            <div class="form-group">
                <label for="pet_name">Bid for</label>
                <select class="form-control" name="pet_name" id="pet_name" required>
                    <option <?php if (!isset($pet_name)) { echo "selected"; } ?> disabled value>Choose...</option>
                    <?php foreach ($valid_pets as $pet) {
                        $select = (isset($pet_name) && $pet_name == $pet['pet_name']) ? 'selected' : ''; ?>
                    <option value="<?php echo $pet['pet_name']; ?>" <?php echo $select; ?>><?php echo $pet['pet_name'];; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="points">Bidding Points</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="number" min="0.00" step="any" name="points" class="form-control" id="points" autofocus accesskey="p" tabindex="6" required value="<?php if (isset($points)) { echo $points; } ?>">
                </div>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo APP_URL; ?>/Pet/index" class="btn btn-info">Cancel</a>
        </form>
    </div>
    <br>
</div>

<script type="text/javascript">
$("#create-bidding").submit(function(e) {
    var points = Number($("#points").val());
    var expected = Number($("#expected_salary").val());

    if (points < expected && !confirm("Your bidding is lower than the provider's expected salary. "
        + "This means your bidding may not succeed. Are you sure to do so?")) {
        e.preventDefault();
    }
});
</script>
