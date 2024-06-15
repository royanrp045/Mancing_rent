<?php
require '../functions/tambah.php';
if (isset($_POST["submit"])) {
    
    if( tambah($_POST) > 0 ) {
        echo "data berhasil ditambahkan";
    } else {
        echo "data gagal ditambahkan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="harga">Harga: </label>
                <input type="text" name="harga" id="harga" required>
            </li>
            <li>
                <label for="kategori">Kategori: </label>
                <input type="text" name="kategori" id="kategori" required>
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>
