<?php

// Database Settings
$servername = "localhost";
$username = "root";
$password = "password";
$database = "portaleripetizioni";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];

if($result = $conn->query("UPDATE notifiche SET visto = 1 WHERE nome = '".$nome."' AND email = '".$email."' ")){
    $_SESSION['response'] = 'Success';
    $_SESSION['response_message'] =  "Notifica oscurata";
    echo(json_encode("success"));
} else {
    $_SESSION['response'] = 'Error';
    $_SESSION['response_message'] =  "Errore nella marcatura della notifica";
}


?>