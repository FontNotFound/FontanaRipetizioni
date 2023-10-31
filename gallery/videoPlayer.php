<?php

$operation = $_POST['operation'];
$playlistname = $_POST['playlist'];

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

$AllVideos = [];

switch($operation){
    case 'loadPlaylist':
        if($result = $conn->query("SELECT * FROM playlists  WHERE nome = '".$playlistname."'")){
            foreach($result as $playlist){
                if($videos = $conn->query("SELECT * FROM video  WHERE playlist = '".$playlistname."'")){
                    foreach($videos as $video){
                        array_push($AllVideos, $video);
                    }
                }
                $playlist['videos'] = $AllVideos;
                echo(json_encode($playlist));
            }
            if($result->num_rows == 0)
                echo(json_encode("no records found"));
        } 
        break;
    }  

?>