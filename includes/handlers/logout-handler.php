<?php
include("../config.php");
unset($_SESSION['userLoggedInName']);
unset($_SESSION['userLoggedInId']);
header("Location: ". ROOT_URL . "homepage.php");
?>