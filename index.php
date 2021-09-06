<?php
if (isset($_POST['submit'])) {
    include 'conn.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . $username . "' AND password = '" . $password . "' ");

    $data = mysqli_fetch_array($query);
    $user_login = $data['username'];
    $user_role = $data['user_role'];


    if (mysqli_num_rows($query) > 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['user_role'] = $user_role;

        echo "berhasil login";
        if ($user_role == 'admin') {
            header('location:data_barang.php');
        }
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0">
    <!-- CSS bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleindex.css" type="text/css">
    <title>Login</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row  main-form" align="center">
            <div class="col-md-12" align="center">
                <table>
                    <form name="login-form" method="POST" class="well well-lg">
                        <h4>Login Sistem Rekapitulasi Barang</h4>
                        <br>
                        <?php if (isset($error)) { ?>
                            <p style="font-style: italic; color: red;">Username / Password anda salah</p>
                        <?php } ?>
                        <tr>
                            <td><label for="Username">Username: </label></td>
                            <td><input type="text" id="username" name="username"></td>
                        </tr>
                        <tr>
                            <td><label for="Password">Password: </label></td>
                            <td><input type="password" id="password" name="password"></td>
                        </tr>
                        <tr>
                            <td > <input name="submit" type="submit" value="Login" class="btn btn-primary btn-block"></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>

        <!-- JS bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>