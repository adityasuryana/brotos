<?php

    require_once('../../config.php');

    $kode_menu = $_GET['kode_menu'];

    $query = "DELETE FROM menu WHERE kode_menu='$kode_menu'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../menu.php");
    }

?>