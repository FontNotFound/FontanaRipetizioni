<?php
//password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
include("components/head.php");

$username = $_POST['user'];
$password = $_POST['password'];
$found = false;

if($result = $conn->query("SELECT * FROM users WHERE nome = '".$username."'"))
{
    foreach($result as $user){
        if(password_verify($password, $user['password'])){
            $_SESSION['user'] = $user['nome'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['response'] = 'Success';
            $_SESSION['response_message'] = "Accesso effettuato come ".$username;
            $found = true;
            header("Location: documents.php");
        }
    }
    if(!$found){
        $_SESSION['response'] = 'Error';
        $_SESSION['response_message'] = "Password non corretta";
        header("Location: login.php");
    }

} else {
    $_SESSION['response'] = 'Error';
    $_SESSION['response_message'] = "Errore imprevisto";
    header("Location: login.php");
}

?>