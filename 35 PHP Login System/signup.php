<!-- INSERTING INTO DATABASE -->

<?php
$showSuccessAlert = false;
$showErrorAlert = false;
$duplicateUsername = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "./partials/_dbconnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // BUG FIX: TO MAKE USERNAME UNINQUE AND IF USERNAME ALREADY EXISTS THEN GIVE ERROR THAT USERNAME ALREADY EXISTS

    $existsSql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $existsSql);
    $numOfRows = mysqli_num_rows($result);
    if ($numOfRows > 0) {
        $duplicateUsername = true;
    } else {
        if ($password == $cpassword) {

            // STORING THE HASH OF THE PASSWORD
            $hash=password_hash($password,PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`username`, `password`, `created`) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                $showSuccessAlert = true;
            }
        } else {
            $showErrorAlert = true;
        }
    }
}



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>SignUp</title>
</head>

<body>
    <?php require "./partials/_nav.php" ?>

    <!-- SUCCESS OR ERROR ALERT -->

    <?php
    if ($showSuccessAlert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your account has been created, now you can login!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }

    if ($showErrorAlert) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> Password and Confirm Password are not same. Please Try Again!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }


    // BUG FIX - ERROR FOR DUPLICATE USERNAME
    if ($duplicateUsername) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> Username Already Exists.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
    ?>


    <div class="container my-5">
        <h1>SignUp!</h1>
    </div>
    <div class="container my-5">

        <!-- FORM FOR SIGNUP -->

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" aria-describedby="cpasswordhelp" placeholder="Confirm Password">
                <div id="cpasswordhelp" class="form-text">Make sure both parrwords match.</div>
            </div>
            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>