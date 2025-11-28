<?php 
include "db_connect.php";

// DELETE product
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    // Gunakan prepared statement untuk selamat
    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: manage_products.php");
    exit;
}

// FETCH latest 12 products
$products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT 12");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Manage Products | Leaf & Bloom</title>
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
        <a href="manage_products.php" class="active">Manage Products</a>
        <a href="index.php">Logout</a>
    </nav>
</header>

<h1 class="admin-title">Manage Products</h1>

<div class="add-product-container">
    <a href="add_product.php"><button class="add-btn">+ Add New Product</button></a>
</div>

<div class="product-list">
<?php while($p = mysqli_fetch_assoc($products)): ?>
    <div class="product-row">
        <img src="<?= htmlspecialchars($p['image']); ?>" class="product-img">
        <div class="product-info">
            <h3><?= htmlspecialchars($p['name']); ?></h3>
            <p>Price: RM<?= htmlspecialchars($p['price']); ?></p>
        </div>
        <div class="product-actions">
            <a href="edit_product.php?id=<?= $p['id']; ?>"><button class="edit-btn">Edit</button></a>
            <a href="manage_products.php?delete_id=<?= $p['id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');">
                <button class="delete-btn">Delete</button>
            </a>
        </div>
    </div>
<?php endwhile; ?>
</div>

<footer>
    <p>&copy; 2025 Hatiey Leaf & Bloom | Admin Dashboard</p>
</footer>

</body>
</html>
