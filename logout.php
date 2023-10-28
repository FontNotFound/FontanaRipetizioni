<?php
include('components/head.php');
unset($_SESSION['user']);
$_SESSION['response'] = "Success";
$_SESSION['response_message'] = "Logout effettuato con successo";
header("Location: index.php");
?>