<?php
if (!hasLogin()) {
    header("Location:" . APP_URL . "/User/login");
}
?>
