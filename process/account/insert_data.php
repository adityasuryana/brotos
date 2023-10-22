<?php
    require_once('../../config.php');

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $status = $_POST['status'];
    $password = $_POST['password'];

    $sql = "INSERT INTO akun(nama, email, no_telp, status, password) VALUES ('$nama','$email','$no_telp','$status','$password')";
    $result = $conn->query($sql);
    //query

    if ($result) {
        header("location:../../account.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>