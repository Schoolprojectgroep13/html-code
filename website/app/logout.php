<?php
require('../app/database.php');
session_start();

$_SESSION['logged_in'] = false;

echo "logging out failed";

header("Location: ../public/index.php?message=$message");
