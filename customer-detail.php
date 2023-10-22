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
                <div class="col-6 position-absolute top-50 start-50 translate-middle">
                    <div class="header">
                        <h1 class="centered-title">Welcome to<br>Brotos</h1>
                        <p class="sub-par mt-3">Please enter your name and the number of people who want to eat here!</p>
                        
                        <form class="mt-4" id="customerDetail" method="POST" action="#">
                            <div class="mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                          </div>
                          <div class="mb-4">
                            <label for="table" class="form-label">Table</label>
                            <input type="number" name="table" class="form-control" id="table" required>
                          </div>
                          <button type="submit" id="submit" class="black-button mt-3">Start Order</button>
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