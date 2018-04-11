<div class="container">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>Edit Service Offer</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/Offer/edit?service_id=<?php echo $service_id; ?>">
            <?php if (isset($errorMessage)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $errorMessage; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" id="start_date" accesskey="u" tabindex="1" required autofocus value="<?php if (isset($start_date)) { echo $start_date; } ?>">
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" id="end_date" accesskey="e" tabindex="2" required value="<?php if (isset($end_date)) { echo $end_date; } ?>">
            </div>

            <div class="form-group">
                <label for="decision_deadline">Decision Deadline</label>
                <input type="date" name="decision_deadline" class="form-control" id="decision_deadline" accesskey="e" tabindex="2" required value="<?php if (isset($decision_deadline)) { echo substr($decision_deadline, 0, 10); } ?>">
            </div>

            <div class="form-group">
                <label for="expected_salary">Expected Salary</label>
                <input type="text" name="expected_salary" class="form-control" id="expected_salary" accesskey="e" tabindex="2" required value="<?php if (isset($expected_salary)) { echo $expected_salary; } ?>">
            </div>

            <div class="form-group">
                <label for="type_selected">Pets Type</label>
                <select name="type_selected[]" class="form-control" id="type_selected" required multiple>
                    <option <?php if (!isset($type_selected)) { echo "selected"; } ?> disabled value>Choose...</option>
                    <?php foreach ($pet_types as $myType) {
                        $selected = (isset($type_selected) && in_array($myType['type'], $type_selected)) ? "selected" : ""; ?>
                    <option value="<?php echo $myType['type']; ?>" <?php echo $selected; ?>><?php echo $myType['type']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo APP_URL; ?>/Offer/myOffers" class="btn btn-info">Cancel</a>
        </form>
    </div>
</div>
