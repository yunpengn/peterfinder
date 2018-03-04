<div class="container">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-4 offset-md-4 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
        <h1>User Login</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/User/login">
            <?php if (isset($errorMessage)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $errorMessage; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="loginUsername">Username or Email Address</label>
                <input type="text" class="form-control" id="loginUsername" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="loginPassword">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        <br>
        <a href="<?php echo APP_URL; ?>/User/signup">Create Account</a>&nbsp;&nbsp;
        <a href="<?php echo APP_URL; ?>/User/forgetPassword">Forget Password?</a>
    </div>
</div>
