<?php
include "../db_connect.php";

if(isset($_POST['submit'])){

    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $price = $_POST['price'];

    // cek kalau ada gambar baru
    if($_FILES['image']['name'] != ""){

        $image_name = $_FILES['image']['name'];
        $tmp_name   = $_FILES['image']['tmp_name'];

        $destination = "../images/" . $image_name;
        move_uploaded_file($tmp_name, $destination);

        $sql = "UPDATE products SET name='$name', price='$price', image='$image_name' WHERE id=$id";

    } else {
        // kalau tak upload gambar baru
        $sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
    }

    mysqli_query($conn, $sql);

    header("Location: manage_products.php?update=1");
    exit();
}
?>
