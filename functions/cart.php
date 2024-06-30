<?php
function addToCart($user_id, $product_id) {
    global $conn;
    $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1) ON DUPLICATE KEY UPDATE quantity = quantity + 1";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("ii", $user_id, $product_id);
        return $stmt->execute();
    } else {
        return false;
    }
}
?>
