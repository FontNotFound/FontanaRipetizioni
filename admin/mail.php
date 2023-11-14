<?php

include("../components/head.php");

$nome = $_POST['name'];
$email = $_POST['email'];
$messaggio = $_POST['message'];

if($result = $conn->query("INSERT INTO notifiche VALUES ('".$nome."','".$email."','".$messaggio."', 0)")){
    $_SESSION['response'] = 'Success';
    $_SESSION['response_message'] =  "Notifica inviata! riceverai la risposta via mail ".$email;
} else {
    $_SESSION['response'] = 'Error';
    $_SESSION['response_message'] =  "Errore nell\'invio della notifica. Ritenta piu' tardi";
}

header("location: ../index.php");

?>