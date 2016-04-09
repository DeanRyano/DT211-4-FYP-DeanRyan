<?php

include('../conf/config.php');
include('func.php');

session_destroy();

header('location: login.php');
?>
