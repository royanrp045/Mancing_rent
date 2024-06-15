<?php
$conn = mysqli_connect("localhost", "root", "", "mancing_rent");

function tambah($data) {
    global $conn;
    $nama = $data["nama"];
    $harga = $data["harga"];
    $kategori = $data["kategori"];
    $gambar = $data["gambar"];

    $query = "INSERT INTO product (nama, harga, kategori, gambar) VALUES ('$nama', '$harga', '$kategori', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


?>
