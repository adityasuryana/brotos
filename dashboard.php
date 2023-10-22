<?php
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['check']!="loggedin"){
//melakukan pengalihan
header("location:login.php");
}

if (isset($_SESSION['status'])){
	if ($_SESSION['status'] == "Admin"){
    } else if ($_SESSION['status'] == "Koki"){
       header('location:order.php');
    } else if ($_SESSION['status'] == "Pelayan"){
        header('location:order.php');
    } else if ($_SESSION['status'] == "Pantry"){
        header('location:stock.php');
    } else if ($_SESSION['status'] == "Kasir"){
        header('location:transaction.php');
    }
}

if (!isset($_SESSION['status'])){
	header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Broto's</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

    <?php
		include 'config.php';
		$akun = mysqli_query($conn,"select * from akun");
        $menu = mysqli_query($conn,"select * from menu");
		$total_akun = mysqli_num_rows($akun);
        $total_menu = mysqli_num_rows($menu);

	?>

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid mx-3 my-4">
                <div class="row d-contents ">
                    <div class="col-4">
                        <p class="fw-medium mb-0"><span class="fw-light">Welcome, </span><?php echo $_SESSION['nama']; ?></p>
                        <p class="mb-0"><?php echo $_SESSION['status']; ?></p>
                    </div>
                    
                    <div class="col-4 text-center">
                        <a class="navbar-brand head-title mx-auto my-4">Broto's</a>
                    </div>
                    
                    <div class="col-4 text-end">
                        <a class="text-dark" href="logout.php">Log out</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row mx-2 mb-3">
                <h3 class="head-title mb-3">Dashboard</h3>
                <div class="col-3">
                    <div class="card p-3 h-100">
                        <div class="text-center">
                            <h3 class="fs-35 fw-bold"><?php echo $total_menu; ?></h3>
                            <p class="fw-light fs-15 mb-0">Menu</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-3 h-100">
                        <div class="text-center">
                            <h3 class="fs-35 fw-bold"><?php echo $total_akun; ?></h3>
                            <p class="fw-light fs-15 mb-0">Account</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-3 h-100">
                        <div class="text-center">
                            <h3 class="fs-35 fw-bold">4</h3>
                            <p class="fw-light fs-15 mb-0">Total Order</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-3 h-100">
                        <div class="text-center">
                            <h3 class="fs-35 fw-bold">4</h3>
                            <p class="fw-light fs-15 mb-0">Revenue</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-2">
                <div class="col">
                    <div class="card p-3 h-100">
                        <h4 class="sub-title mb-3">Order</h4>
                        <table id="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg fixed-bottom">
            <div class="container-fluid justify-content-center mb-3">
                <ul class="navbar-nav navbar-bottom">
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0 active" href="dashboard.php"><i class="fa-solid fa-house mb-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0" href="account.php"><i class="fa-solid fa-users mb-2"></i>Account</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0" href="stock.php"><i class="fa-solid fa-boxes-stacked mb-2"></i>Stock</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0" href="menu.php"><i class="fa-solid fa-book mb-2"></i>Menu</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0" href="order.php"><i class="fa-solid fa-rectangle-list mb-2"></i>Order</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0" href="transaction.php"><i class="fa-solid fa-file-invoice mb-2"></i>Transaction</a>
                    </li>
                  </ul>
            </div>
          </nav>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
			$(document).ready( function () {
			$('#table').DataTable({
				pageLength: 5,
				lengthMenu: [[5, 10, 20, -1], [5, 10, 15, 'All']],
				paging: true,
				searching: true,
				ordering: true,
				stateSave: true,
				language: {
					search: '',
					searchPlaceholder: "Search",
					"lengthMenu": "Show _MENU_" },
			});
		} );
	    </script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
        
	    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script src="https://kit.fontawesome.com/dc9826e1b1.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>