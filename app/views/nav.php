<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <span class="navbar-brand mb-0 h1">Peter Finder</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
        <?php
        if (isset($_SESSION['authorized']) && $_SESSION['authorized'] == true) {
        ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome back, <?php echo $_SESSION['username']; ?><b class="cavet"></b>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Home/logout">Sign out</a>
                </div>
            </li>
        <?php
        } else {
        ?>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Sign in</a>
            </li>
        <?php
        }
        ?>
        </ul>
    </div>
</nav>
<br><br><br>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sign in</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo APP_URL; ?>/Home/login">
                    <div class="form-group">
                        <label for="loginUsername">Username</label>
                        <input type="text" class="form-control" id="loginUsername" name="username" aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" data-toggle="modal" data-target="#signupModal">Create Account</a>
                <a href="#" data-toggle="modal" data-target="#signupModal">Forget Password?</a>
            </div>
        </div>
    </div>
</div>
