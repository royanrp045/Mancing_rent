<?php
require '../functions/connect.php';
require '../functions/hapus.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    if (hapus($id) > 0) {
        header("Location: admin.php");
    } else {
        echo "Error: Unable to delete the product.";
    }
}
?>
