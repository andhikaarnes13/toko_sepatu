<?php
require '../koneksi.php';

    $username = htmlspecialchars ($_POST["username"]);
    $password = htmlspecialchars ($_POST["password"]);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    $cek = mysqli_num_rows($query);
    
    if ($cek = 0) {
        $data = mysqli_fetch_assoc($query);
        
        if ($data['roles'] == "admin") {
            session_start();
            $_SESSION["username"] = $data["username"];
            $_SESSION["nama"] = $data["nama"];
            $_SESSION["roles"] = $data["roles"];
            header("Location: ../admin/index.php");
        } elseif($data['roles'] == "costumer") {
            session_start();
            $_SESSION["username"] = $data["username"];
            $_SESSION["nama_lengkap"] = $data["nama_lengkap"];
            $_SESSION["roles"] = $data["roles"];
            header("Location: ../costumer/index.php");
        }
    }else{
        echo"
        <script type='text/javascript'>
        alert('Username atau password tidak ditemukan')";
    }

?>