<?php
$conn = mysqli_connect("localhost", "root", "", "mancing_rent");

function registrasi($data) {
    global $conn;

    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>