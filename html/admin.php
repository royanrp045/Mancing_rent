<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image'];

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($image["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($image["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            // Connect to the database
            $conn = new mysqli('localhost', 'root', '', 'mancing_rent');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO products (name, price, category, image) VALUES ('$name', '$price', '$category', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "New product added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form action="admin_add_product.php" method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="best">Best</option>
            <option value="reels">Reels</option>
            <option value="float">Float</option>
        </select><br><br>
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required><br><br>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>
