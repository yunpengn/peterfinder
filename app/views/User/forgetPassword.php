<div class="container">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-4 offset-md-4 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>Forget Password?</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/User/forgetPassword">
            <?php if (isset($successMessage)) { ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo $successMessage; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } else if (isset($errorMessage)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $errorMessage; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="someone@example.com" accesskey="e" tabindex="2" required>
                <p id="emailHelp" class="form-text text-muted" style="color: #34495E; font-style: italic;">
                    * We will send an email to this address for verification. Please use the same email as the one used to sign up.
                </p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
        <a href="<?php echo APP_URL; ?>/User/login">Sign in</a>&nbsp;&nbsp;
        <a href="<?php echo APP_URL; ?>/User/signup">Create Account</a>
    </div>
</div>
