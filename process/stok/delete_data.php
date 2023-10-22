<?php

    require_once('../../config.php');

    $kode_bahan = $_GET['kode_bahan'];

    $query = "DELETE FROM stock WHERE kode_bahan='$kode_bahan'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../stock.php");
    }

?>