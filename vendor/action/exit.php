<?php 
include "../components/connect.php";
unset($_SESSION['user']);

header('location: ../../index.php');