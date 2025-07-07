<?php
include("./config.php");
if (isset($_POST['add-food'])) {
    $name = $_POST['product_name'];
    $Description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $material = $_POST['material'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $depth = $_POST['depth'];
    $uploadDir = "../assets/upload/";
    $file = $_FILES['product_image']['name']; // Use the actual file name instead of tmp_name
    $dst = $uploadDir . $file;
    $dst_db = "image/" . $file;
    move_uploaded_file($_FILES['product_image']['tmp_name'], $dst);



    $sql = "INSERT INTO products (`product_name`, `description`, `price`,`category`,`material`,`width`,`height`,`depth`,`image_path`,`created_at`)
           VALUES ('$name', '$Description','$price','$category','$dst_db','$material','$width','$height','$depth', NOW())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: ../html/admin_panale/add_product.php");
    }



}

?>