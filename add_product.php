<?php
include "db_connect.php";

// Initialize variables for form fields
$name = $price = $image = "";
$success = $error = "";

// Handle form submission
if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);
    $image = trim($_POST['image']); // boleh guna URL atau path file yang diupload

    if($name == "" || $price == "" || $image == ""){
        $error = "All fields are required!";
    } elseif(!is_numeric($price)){
        $error = "Price must be a number!";
    } else {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $name, $price, $image);
        if($stmt->execute()){
            $success = "Product added successfully!";
            $stmt->close();
            header("Location: manage_products.php"); // redirect balik ke manage products
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
<title>Add New Product | Admin</title>
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

<h1 class="admin-title">Add New Product</h1>

<div class="form-container">
    <?php if($error) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if($success) echo "<p style='color:green;'>$success</p>"; ?>

    <form action="add_product.php" method="post">
        <label for="name">Product Name:</label><br>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($name); ?>" required><br><br>

        <label for="price">Price (RM):</label><br>
        <input type="text" name="price" id="price" value="<?= htmlspecialchars($price); ?>" required><br><br>

        <label for="image">Image URL or Path:</label><br>
        <input type="text" name="image" id="image" value="<?= htmlspecialchars($image); ?>" required><br><br>

        <button type="submit" name="submit">Add Product</button>
    </form>
</div>

<footer>
    <p>&copy; 2025 Hatiey Leaf & Bloom | Admin Dashboard</p>
</footer>

</body>
</html>
