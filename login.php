<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Broto's</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 position-absolute top-50 start-50 translate-middle d-flex">
                    <div class="header">
                        <h3 class="head-title text-center">Broto's</h3>
                        <h1 class="centered-title">Employee Portal</h1>
                        <p class="sub-par mt-3">This is a secure system and you will need to provide your login details to access the site.</p>
                        <?php
                            if(isset($_GET['message'])){
                                if($_GET['message']=="failed"){
                                    echo "<div class='alert alert-danger alert-dismissible fade show mb-4 border-0'>Username or Password incorrect!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                }
                            }
                        ?>
                        <form method="POST" action="login_controller.php">
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <input type="submit" id="submit" class="black-button mt-3" value="Login">
                        </form>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/dc9826e1b1.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>