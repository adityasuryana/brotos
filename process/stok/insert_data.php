<?php
    require_once('../../config.php');

    $kode_bahan = $_POST['kode_bahan'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal_restock = $_POST['tanggal_restock'];
    $status = $_POST['status'];

    $sql = "INSERT INTO stok(nama, jumlah, harga, tanggal_restock, status) VALUES ('$nama','$jumlah','$harga','$tanggal_restock','$status')";
    $result = $conn->query($sql);
    //query

    if ($result) {
        header("location:../../stock.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>