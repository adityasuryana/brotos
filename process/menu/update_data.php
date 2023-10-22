<?php

    require_once('../../config.php');

    $kode_menu = $_POST['kode_menu'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $kategori = $_POST['bahan_baku'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $query = "UPDATE menu SET nama='$nama', kategori='$kategori', kategori='$kategori', harga='$harga', deskripsi='$deskripsi' WHERE kode_menu='$kode_menu'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../menu.php");
    }

?>