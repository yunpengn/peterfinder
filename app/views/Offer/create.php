<div class="container">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>New Service Offer</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/Offer/create">
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
                <input type="date" name="start_date" class="form-control" id="start_date" accesskey="s" tabindex="1" required autofocus value="<?php if (isset($start_date)) { echo $start_date; } ?>">
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" id="end_date" accesskey="e" tabindex="2" required value="<?php if (isset($end_date)) { echo $end_date; } ?>">
            </div>

            <div class="form-group">
                <label for="decision_deadline">Decision Deadline</label>
                <input type="date" name="decision_deadline" class="form-control" id="decision_deadline" accesskey="e" tabindex="2" required value="<?php if (isset($decision_deadline)) { echo substr($decision_deadline, 0, strpos($decision_deadline, " ")); } ?>">
            </div>

            <div class="form-group">
                <label for="expected_salary">Expected Salary</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                    </div>
                    <input type="number" min="0.00" step="any" name="expected_salary" class="form-control" id="expected_salary" accesskey="e" tabindex="2" required value="<?php if (isset($expected_salary)) { echo $expected_salary; } ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="type_selected">Target Pet Types</label>
                <select name="type_selected[]" class="form-control" id="type_selected" required multiple>
                    <option <?php if (!isset($type_selected)) { echo "selected"; } ?> disabled value>Choose...</option>
                    <?php foreach ($pet_types as $myType) { ?>
                    <option value="<?php echo $myType['type']; ?>"><?php echo $myType['type']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo APP_URL; ?>/Pet/index" class="btn btn-info">Cancel</a>
        </form>
    </div>
</div>

<script type="text/javascript">
    $("#start_date").change(function() {
        var startDate = $("#start_date").val();
        var endDate = $("#end_date").val();

        if (endDate == "") {
            $("#end_date").val(startDate);
        }
    });
</script>
