<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Poppins:wght@400;600;700&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="assets/styles/font-awesome.min.css">

    <!-- MyStyle -->

    <!-- Responsive Style -->
    <link rel="stylesheet" href="assets/styles/responsive.css">

    <!-- Logo Title -->
    <link rel="icon" href="../assets/img/ico_cakrabudaya.png" type="image/x-icon">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="box p-5 bg-light rounded">
                <h1>Admin</h1>
                <form action="aksi_login.php" method="POST">
                    <div class="form-group row mb-3">
                        <label for="InputEmail" class="col-sm-3 col-form-label">Username:</label>
                        <div class="col">
                            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="exampleInputPassword1" class="col-sm-3 col-form-label">Password:</label>
                        <div class="col">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
</body>
<?php if (isset($_GET['pesan'])) {  ?>
    <label style="color:red;"><?php echo $_GET['pesan']; ?></label>
<?php } ?>

</html>