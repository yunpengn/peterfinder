<div class="container">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>Review for Pet Owner</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/History/reviewForOwner?service_id=<?php echo $service_id; ?>">
            <?php if (isset($errorMessage)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $errorMessage; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>

            <div class="form-group">
                <label for="review">Review</label>
                <input type="text" name="review" class="form-control" id="review" accesskey="r" tabindex="1" required autofocus value="<?php if (isset($review_for_owner)) { echo $review_for_owner; } ?>">
            </div>

            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" min="1" max="5" step="1" name="rating" class="form-control" id="rating" accesskey="t" tabindex="2" required value="<?php if (isset($rating_for_owner)) { echo $rating_for_owner; } ?>">
            </div>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo APP_URL; ?>/History/index" class="btn btn-info">Cancel</a>
        </form>
    </div>
</div>
