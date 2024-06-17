<?php
require '../functions/ubah.php';

$id = $_GET["id"];

if( isset($_POST["submit"]) ) {
	
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'del.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'del.php';
			</script>
		";
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
    <h1>Ubah</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $product["id"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="harga">Harga: </label>
                <input type="text" name="harga" id="harga">
            </li>
            <li>
                <label for="kategori">Kategori: </label>
                <input type="text" name="kategori" id="kategori" >
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>
