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
        exit;
    } else {
        echo "<script>alert('Username atau password salah. Silahkan coba lagi atau registrasi.');</script>";
        header('Location: registrasi.php');
    }
}
?>