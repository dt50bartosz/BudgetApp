<?php

session_start();


function isUserLoggedIn() {
    return isset($_SESSION["username"]);
}

if (!isUserLoggedIn()) {
    header('Location: ../Main-Page/index.php');
    exit();
}