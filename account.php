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
    } else if ($_SESSION['status'] == "Pelayan"){
       header('location:order.php');
    } else if ($_SESSION['status'] == "Pantry"){
        header('location:stock.php');
    } else if ($_SESSION['status'] == "Koki"){
        header('location:order.php');
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
            require_once('config.php');
            $sql = "SELECT * FROM akun";
            $result = mysqli_query($conn,$sql);
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
                <div class="mb-3">
                    <h3 class="head-title mb-2">Account</h3>
                    <button type="button" class="tb-button py-2 px-4 my-2" data-bs-toggle="modal" data-bs-target="#addAccount">
                        <span><i class="fa-solid fa-plus me-2"></i></span>New Account
                    </button>
                </div>

                <div class="col-12">
                    <div class="card bg-gray p-3">
                        <table id="table" class="w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Password</th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php while($user = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $user['nama']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['no_telp']; ?></td>
                                    <td><?php echo $user['status']; ?></td>
                                    <td><?php echo $user['password']; ?></td>
                                    <td class="text-center">
    									<a class="btn btn-edit me-2" data-bs-toggle="modal" data-bs-target="#editAccount<?php echo $user['id'];?>"><i class="fa-solid fa-edit"></i></a>
    									<a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusAccount<?php echo $user['id'];?>"><i class="fa-solid fa-trash"></i></a>
    								</td>
                                </tr>

                                <div class="modal fade" id="editAccount<?php echo $user['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border: none; border-radius: 20px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Account</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form id="accountForm" method="POST" action="process/account/update_data.php">
                                                    <div class="">
                                                        <input type="text" value="<?php echo $user['id']; ?>" name="id" hidden>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" name="nama" value="<?php echo $user['nama']; ?>" class="form-control" id="name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control" id="email" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="number" name="no_telp" value="<?php echo $user['no_telp']; ?>" class="form-control" id="phone" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" name="password" value="<?php echo $user['password']; ?>" class="form-control" id="password" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="<?php echo $user['status']; ?>"><?php echo $user['status']; ?></option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="Pelayan">Pelayan</option>
                                                            <option value="Pantry">Pantry</option>
                                                            <option value="Koki">Koki</option>
                                                            <option value="Kasir">Kasir</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" id="submit" class="tb-button w-25 float-end">Save</button>  
                                                    <button type="button" class="btn cancel-button w-25 me-3 float-end" data-bs-dismiss="modal">Cancel</button>
                                                </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="hapusAccount<?php echo $user['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" enctype="multipart/form-data">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border: none; border-radius: 20px;">
                                            <div class="modal-header justify-content-center">
                                                <h5 class="d-block modal-title">Delete Account</h5>
                                            </div>
                                                                        
                                            <div class="modal-body">
                                                <form id="menuForm" method="POST" action="process/account/delete_data.php?id=<?php echo $user['id']; ?>">
                                                    <div class="">
                                                        <input type="text" name="id" hidden>
                                                    </div>
                                                                                
                                                    <div class="text-center mb-3">
                                                        <h4>Delete <span class="fw-bold"><?php echo $user['nama'];?></span> permanently?</h4>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="button" class="btn cancel-button w-25 me-3" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" id="submit" class="delete-button w-25">Delete</button>
                                                    </div>                      
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
			    <div class="modal-content" style="border: none; border-radius: 20px;">
				    <div class="modal-header">
				        <h5 class="modal-title">New Account</h5>
				    </div>
				    
                    <div class="modal-body">
						<form id="accountForm" method="POST" action="process/account/insert_data.php">
							<div class="">
								<input type="text" name="id" hidden>
							</div>
							
                            <div class="mb-3">
							    <label for="name" class="form-label">Name</label>
								<input type="text" name="nama" class="form-control" id="name" required>
							</div>
							
                            <div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" name="email" class="form-control" id="email" required>
							</div>
                            
                            <div class="mb-3">
								<label for="phone" class="form-label">Phone</label>
								<input type="number" name="no_telp" class="form-control" id="phone" required>
							</div>
							
                            <div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" name="password" class="form-control" id="password" required>
							</div>
                            
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="">Select Status</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Pelayan">Pelayan</option>
                                    <option value="Pantry">Pantry</option>
                                    <option value="Koki">Koki</option>
                                    <option value="Kasir">Kasir</option>
                                </select>
                            </div>
                            <button type="submit" id="submit" class="tb-button w-25 float-end">Add</button>  
							<button type="button" class="btn cancel-button w-25 me-3 float-end" data-bs-dismiss="modal">Cancel</button>
						</form>
				    </div>
				</div>
			</div>
		</div>

        <nav class="navbar navbar-expand-lg fixed-bottom">
            <div class="container-fluid justify-content-center mb-3">
                <ul class="navbar-nav navbar-bottom">
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0" href="dashboard.php"><i class="fa-solid fa-house mb-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0 active" href="account.php"><i class="fa-solid fa-users mb-2"></i>Account</a>
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
	    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" charset="utf-8"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script src="https://kit.fontawesome.com/dc9826e1b1.js" crossorigin="anonymous"></script>
    </body>
</html>