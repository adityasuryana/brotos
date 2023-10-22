<?php

    require_once('../../config.php');

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $status = $_POST['status'];
    $password = $_POST['password'];

    $query = "UPDATE akun SET nama='$nama', email='$email', no_telp='$no_telp', status='$status', password='$password' WHERE id='$id'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../account.php");
    }

?>