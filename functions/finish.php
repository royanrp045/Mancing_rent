<?php
$conn = mysqli_connect("localhost", "root", "", "mancing_rent");

function finish($id) {
    global $conn;
    $query = "UPDATE checkout SET status = 'Finish' WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    if (finish($id) > 0) {
        header("Location: ../home_admin/pesanan.php");
    } else {
        echo "Error: Tidak dapat mengubah status.";
    }
}
?>
