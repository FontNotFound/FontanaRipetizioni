<?php
include("components/head.php");

$data = json_decode(file_get_contents('php://input'), true);
$data = $data['selected'];
$i = 0;
foreach($data['orario'] as $orario){
    $result = $conn->query("INSERT INTO prenotazione VALUES
    ('".$orario."',".($data['giorno'][$i]).",".$data['settimana'].",'".$data['nome']."',".$data['phoneNumber'].",'".$data['materia']."','".$data['argomento']."',".$data['prezzo'].",'".$data['mail']."')");

    $i++;
}

$i = 0;
foreach($data['orario'] as $orario){
    $result = $conn->query("UPDATE ORARIO SET libero = false WHERE fascia = '".$orario."' AND giorno = '".$data['giorno'][$i]."' AND settimana = 1");
    $i++;
}

if($result){
    $_SESSION['booked'] = 'Success';
}
?>