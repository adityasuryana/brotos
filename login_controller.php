<?php 
session_start();
include 'config.php';
 
$email = $_POST['email'];
$password = $_POST['password'];
 
$result = mysqli_query($conn,"SELECT * FROM akun where email='$email' and password='$password'");
$cek = mysqli_num_rows($result);
 
if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	//menyimpan session user, nama, status dan id login
	if($data['status']=="Admin"){
        $_SESSION['email'] = $email;
		$_SESSION['nama'] = $data['nama'];
        $_SESSION['no_telp'] = $data['no_telp'];
		$_SESSION['check'] = "loggedin";
		$_SESSION['status'] = "Admin";
		header("location:dashboard.php");

    } else if($data['status']=="Pelayan"){
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['email'] = $email;
        $_SESSION['no_telp'] = $data['no_telp'];
		$_SESSION['check'] = "loggedin";
		$_SESSION['status'] = "Pelayan";
		header("location:order.php");
	
	} else if($data['status']=="Kasir"){
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['email'] = $email;
        $_SESSION['no_telp'] = $data['no_telp'];
		$_SESSION['check'] = "loggedin";
		$_SESSION['status'] = "Kasir";
		header("location:transaction.php");
	
	} else if($data['status']=="Koki"){
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['email'] = $email;
        $_SESSION['no_telp'] = $data['no_telp'];
		$_SESSION['check'] = "loggedin";
		$_SESSION['status'] = "Koki";
		header("location:order.php");
	
	} else if($data['status']=="Pantry"){
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['email'] = $email;
        $_SESSION['no_telp'] = $data['no_telp'];
		$_SESSION['check'] = "loggedin";
		$_SESSION['status'] = "Pantry";
		header("location:stock.php");

	} else{
		header("location:login.php?message=failed");
	}

}
else {
	header("location:login.php?message=failed");
}
?>