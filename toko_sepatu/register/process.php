<?php
require '../koneksi.php';

function tambahUser($data){
    global $conn;

    $username = htmlspecialchars ($data["username"]);
    $name = htmlspecialchars ($data["name"]);
    $password = htmlspecialchars ($data["password"]);
    $roles = htmlspecialchars ($data["roles"]);

    $query = "INSERT INTO user VALUES(NULL, '$username', '$name', '$password', '$roles')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>