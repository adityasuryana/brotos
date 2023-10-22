<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "brotos";

    $conn = mysqli_connect($server, $user, $pass, $database);

    if(!$conn){
        die("<script>alert('Gagal Tersambung dengan Database.')</script>");

    }
?>
