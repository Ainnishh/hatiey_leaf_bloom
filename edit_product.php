<?php
include "db_connect.php";

if(!isset($_GET['id'])){
    // Kalau tiada id, redirect balik
    header("Location: manage_products.php");
    exit;
}

$id = $_GET['id'];

// Fetch existing product data
$stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0){
    // Kalau product tak jumpa, redirect balik
    header("Location: manage_products.php");
    exit;
}

$product = $result->fetch_assoc();
$stmt->close();

// Initialize variables
$name = $product['name'];
$price = $product['price'];
$image = $product['image'];
$error = "";

// Handle form submission
if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);
    $image = trim($_POST['image']);

    if($name == "" || $price == "" || $image == ""){
        $error = "All fields are required!";
    } elseif(!is_numeric($price)){
        $error = "Price must be a number!";
    } else {
        // Update database
        $stmt = $conn->prepare("UPDATE products SET name=?, price=?, image=? WHERE id=?");
        $stmt->bind_param("sdsi", $name, $price, $image, $id);
        if($stmt->execute()){
            $stmt->close();
            header("Location: manage_products.php");
            exit;
        } else {
            $error = "Database error: ".$conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product | Admin</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="images/logo.png" class="main-logo">
    </div>
    <nav>
        <a href="admin.php">Dashboard</a>
        <a href="messages.php">Messages</a>
        <a href="orders.php">Orders</a>
        <a href="manage_products.php">Manage Products</a>
        <a href="index.php">Logout</a>
    </nav>
</header>

<h1 class="admin-title">Edit Product</h1>

<div class="form-container">
    <?php if($error) echo "<p style='color:red;'>$error</p>"; ?>

    <form action="edit_product.php?id=<?= $id; ?>" method="post">
        <label for="name">Product Name:</label><br>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($name); ?>" required><br><br>

        <label for="price">Price (RM):</label><br>
        <input type="text" name="price" id="price" value="<?= htmlspecialchars($price); ?>" required><br><br>

        <label for="image">Image URL or Path:</label><br>
        <input type="text" name="image" id="image" value="<?= htmlspecialchars($image); ?>" required><br><br>

        <button type="submit" name="submit">Update Product</button>
    </form>
</div>

<footer>
    <p>&copy; 2025 Hatiey Leaf & Bloom | Admin Dashboard</p>
</footer>

</body>
</html>
