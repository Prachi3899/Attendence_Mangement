<?php
    session_start();
    unset($_SESSION['clerk_email']);
    echo "<script>window.location.assign('../index.php')</script>";
?>