<?php
    require_once('../../config.php');

    $kode_menu = $_POST['kode_menu'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $bahan_baku = $_POST['bahan_baku'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    

    $sql = "INSERT INTO menu(nama, kategori, bahan_baku, harga, deskripsi) VALUES ('$nama','$kategori','$bahan_baku','$harga','$deskripsi')";
    $result = $conn->query($sql);
    //query

    if ($result) {
        header("location:../../menu.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>