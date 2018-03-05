<div class="container">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-4 offset-md-4 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
        <h1>Create New Account</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/User/signup">
            <?php if (isset($errorMessage)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $errorMessage; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Type username" accesskey="u" tabindex="1" required autofocus>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="someone@example.com" accesskey="e" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Type password" accesskey="p" tabindex="3" required>
            </div>
            <div class="form-group">
                <label for="type">User Type</label>
                <select name="type" class="form-control" id="type" required>
                    <option selected disabled value>Choose...</option>
                    <option value="owner">Pet owner</option>
                    <option value="taker">Care taker</option>
                    <option value="both">Both</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
        <a href="<?php echo APP_URL; ?>/User/login">Sign in</a>&nbsp;&nbsp;
        <a href="<?php echo APP_URL; ?>/User/forgetPassword">Forget Password?</a>
    </div>
</div>
