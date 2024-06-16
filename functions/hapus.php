<?php
$conn = mysqli_connect("localhost", "root", "", "mancing_rent");

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM product WHERE id = $id");

    return mysqli_affected_rows($conn);
}
?>
