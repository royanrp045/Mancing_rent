<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "mancing_rent");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Mendapatkan user_id dari session
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];
$total_price = $_POST['total_price'];
$shipping_cost = $_POST['shipping_cost'];
$address = $_POST['address'];

// Mengambil item dari keranjang belanja
$cart_items = fetch_cart_items($user_id, $conn);

foreach ($cart_items as $item) {
    $product_id = $item['product_id'];
    $quantity = $item['quantity'];

    // Insert data ke tabel checkout
    $query = "INSERT INTO checkout (user_id, product_id, quantity, total_price, shipping_cost, address, checkout_date) 
              VALUES ('$user_id', '$product_id', '$quantity', '$total_price', '$shipping_cost', '$address', NOW())";
    
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
}

// Hapus item dari keranjang setelah checkout
$query = "DELETE FROM cart WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Tutup koneksi setelah selesai digunakan
mysqli_close($conn);

// Redirect ke halaman sukses atau halaman lain
header("Location: success.php");
exit();

// Fungsi untuk mengambil item dari keranjang belanja
function fetch_cart_items($user_id, $conn) {
    $query = "SELECT cart.quantity, product.id as product_id 
              FROM cart 
              INNER JOIN product ON cart.product_id = product.id 
              WHERE cart.user_id = '$user_id'";
    
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $cart_items = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cart_items[] = $row;
    }

    return $cart_items;
}
?>
