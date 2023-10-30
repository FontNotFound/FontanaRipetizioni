<?php
$type = $_POST['type'];
$user = $_POST['user'];
$email = $_POST['email'];

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

$documents = [];

switch($type){
    case 'document':
        if($result = $conn->query("SELECT * FROM documento_utenti as du LEFT JOIN documento as d ON du.documento = d.nome WHERE utente_nome = '".$user."' AND utente_email = '".$email."' ")){
            foreach($result as $document){
                array_push($documents, $document);
            }
        } 
        echo(json_encode($documents));
        break;
    case 'upload_document':
        $document = $_POST['file'];
        echo($document);
        break;
    }  


?>