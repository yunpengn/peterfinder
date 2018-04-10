<?php
if (!hasLogin()) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>Edit My Bidding</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/Bidding/edit?service_id=<?php echo $service_id; ?>&pet_name=<?php echo $pet_name; ?>">
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
                <label for="bid_point">Bid Point</label>
                <input type="number" name="bid_point" class="form-control" id="bid_point" value="<?php if (isset($bid_point)) { echo $bid_point; } ?>" placeholder="Enter your bidding point" accesskey="p" tabindex="1" required autofocus>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo APP_URL; ?>/Bidding/index" class="btn btn-info">Cancel</a>
        </form>
    </div>
</div>

