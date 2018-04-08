<?php
if (!hasLogin()) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <h1>Edit My Pet</h1>
        <br>
        <form method="post" action="<?php echo APP_URL; ?>/Pet/edit">
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
                <label for="petname">Pet Name</label>
                <input type="text" name="petname" class="form-control" id="username" value="<?php if (isset($petname)) { echo $petname; } ?>" placeholder="Type your pet's name" accesskey="n" tabindex="1" required autofocus>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control" id="gender">
                	<option <?php if (!isset($gender) || $gender == "unknown") { echo "selected"; } ?> disabled value>Choose...</option>
                    <option value="male" <?php if (isset($gender) && $gender == "male") { echo "selected"; } ?>>Male</option>
                    <option value="female" <?php if (isset($gender) && $gender == "female") { echo "selected"; } ?>>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control" id="type">
                	<option selected disabled value>Choose...</option>
                </select>
            </div>

            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" class="form-control" id="birthday" accesskey="d" tabindex="2" autofocus value="<?php if (isset($birthday)) { echo $birthday; } ?>">
            </div>

            <div class="form-group">
				<label for="bio">Bio</label>
				<textarea name="bio" class="form-control" id="bio" placeholder="Introduce your pet here" accesskey="b" tabindex="3" rows="3"><?php if (isset($bio)) { echo $bio; } ?></textarea>
			</div>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo APP_URL; ?>" class="btn btn-info">Cancel</a>
        </form>
    </div>
</div>

