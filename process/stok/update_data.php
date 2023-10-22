<?php

    require_once('../../config.php');

    $kode_bahan = $_POST['kode_bahan'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal_restock = $_POST['tanggal_restock'];
    $status = $_POST['status'];

    $query = "UPDATE stok SET nama='$nama', jumlah='$jumlah', harga='$harga', tanggal_restock='$tanggal_restock', status='$status' WHERE kode_bahan='$kode_bahan'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../stock.php");
    }

?>