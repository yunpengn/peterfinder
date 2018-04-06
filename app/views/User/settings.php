<?php
if (!hasLogin()) {
    header("Location:" . APP_URL . "/User/login");
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>User Settings</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/User/settings">
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
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="<?php if (isset($username)) { echo $username; } ?>" placeholder="Type username" accesskey="u" tabindex="1" required autofocus disabled>
            </div>

            <div class="form-group">
                <label for="username">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php if (isset($email)) { echo $email; } ?>" placeholder="Type email" accesskey="e" tabindex="2" required disabled>
            </div>

            <div class="form-group">
                <label for="username">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="name" value="<?php if (isset($last_name)) { echo $last_name; } ?>" placeholder="Type your last (family) name" accesskey="l" tabindex="3">
            </div>

            <div class="form-group">
                <label for="username">First Name</label>
                <input type="text" name="first_name" class="form-control" id="name" value="<?php if (isset($first_name)) { echo $first_name; } ?>" placeholder="Type your first (given) name" accesskey="f" tabindex="4">
            </div>

            <div class="form-group">
                <label for="type">Gender</label>
                <select name="type" class="form-control" id="type">
                	<option <?php if (!isset($gender) || $gender == "unknown") { echo "selected"; } ?> disabled value>Choose...</option>
                    <option value="male" <?php if (isset($gender) && $gender == "male") { echo "selected"; } ?>>Male</option>
                    <option value="female" <?php if (isset($gender) && $gender == "female") { echo "selected"; } ?>>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="username">Phone Number</label>
                <input type="tel" name="telephone" class="form-control" id="name" value="<?php if (isset($telephone)) { echo $telephone; } ?>" placeholder="Type your phone number" accesskey="p" tabindex="5">
            </div>

            <div class="form-group">
				<label for="bio">Bio</label>
				<textarea name="bio" class="form-control" id="bio" value="<?php if (isset($bio)) { echo $bio; } ?>" placeholder="Introduce yourself here" accesskey="b" tabindex="6" rows="3"></textarea>
			</div>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo APP_URL; ?>" class="btn btn-info">Cancel</a>
        </form>
    </div>
</div>

