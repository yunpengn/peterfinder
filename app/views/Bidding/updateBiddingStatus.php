<?php
if (!hasLogin()) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>Edit Bidding Status</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/Bidding/updateStatus?service_id=<?php echo $service_id; ?>&bidder=<?php echo $bidder; ?>&pet_name=<?php echo $pet_name; ?>">
            <?php if (isset($errorMessage)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $errorMessage; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <?php if (isset($successMessage)) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $successMessage; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="bid_status">Biding Status</label>
                <select name="bid_status" class="form-control" id="bid_status">
                    <option <?php if (!isset($bid_status) || $bid_status == "unknown") { echo "selected"; } ?> disabled value>Choose...</option>
                    <option value="pending" <?php if (isset($bid_status) && $bid_status == "pending") { echo "selected"; } ?>>Pending</option>
                    <option value="succeed" <?php if (isset($bid_status) && $bid_status == "succeed") { echo "selected"; } ?>>Succeed</option>
                    <option value="fail" <?php if (isset($bid_status) && $bid_status == "fail") { echo "selected"; } ?>>Fail</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo APP_URL; ?>/Bidding/index" class="btn btn-info">Cancel</a>
        </form>
    </div>
</div>

