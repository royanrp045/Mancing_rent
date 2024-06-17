<?php
$conn = mysqli_connect("localhost", "root", "", "mancing_rent");

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE product SET
				nama = '$nama',
				harga = '$harga',
				kategori = '$kategori',
				gambar = '$gambar'
			  WHERE id = $id
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
