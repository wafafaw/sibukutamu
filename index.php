<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <title>Login</title>
 <link rel="icon" href="img/logoo.png" type="image/x-icon">
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <form class="box" action="" method="POST">
        <h2>Login Admin</h2>
        <input type="email" name="user" placeholder="Email">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>

<?php
include "app/koneksi.php";
if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $cari = $konek->query("SELECT * FROM login WHERE user='$user' and pass='$pass'");
    $cek = $cari->num_rows;
    if ($cek == 0) {
        echo "<script>
        alert('Maaf, Login Gagal, Pastikan Username dan Password anda Benar');
        </script>";
    } else {
        $_SESSION['user'] = $user;
    ?>
    <script>
        document.location.href = 'app/index.php';
    </script>
<?php
    }
}
?>