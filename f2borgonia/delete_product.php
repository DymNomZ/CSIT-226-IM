<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $deleteQuery = "DELETE FROM tblproduct WHERE product_id = $product_id";
    mysqli_query($connection, $deleteQuery);

    echo "<script>alert('Product deleted successfully.'); window.location.href='dashboard.php';</script>";
} else {
    echo "<script>alert('No product ID provided.'); window.location.href='dashboard.php';</script>";
}
?>
