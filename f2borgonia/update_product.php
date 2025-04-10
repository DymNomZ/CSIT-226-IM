<?php    
    include 'connect.php';    
    //require_once 'includes/header.php'; 
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];

        $query = "SELECT * FROM tblproduct WHERE product_id = $product_id";
        $result = mysqli_query($connection, $query);
        $product = mysqli_fetch_assoc($result);
    }
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMS: Store Inventory management system</title>
    <meta name="description" content="SIMS is an easy-to-use application designed to help businesses of all sizes, 
    including small stores, efficiently track and manage their inventory.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style_update_product.css"> 
</head>
<body>
    <div>
        <form method="post">
                <h2>Update Product</h1>
                <p>Manufacturer:</p>
                <input type="text" name="manufacturer" value="<?php echo $product['manufacturer'] ?? ''; ?>">
                <p>Name:</p>
                <input type="text" name="product_name" value="<?php echo $product['product_name'] ?? ''; ?>">
                <p>Quantity in Stock:</p>
                <input type="number" name="quantity_in_stock" value="<?php echo $product['quantity_in_stock'] ?? ''; ?>">
                <p>Measurement:</p>
                <input type="text" name="measurement" value="<?php echo $product['measurement'] ?? ''; ?>">
                <p>Bought Price:</p>
                <input type="number" name="bought_price" min="0" step="any" value="<?php echo $product['bought_price'] ?? 0; ?>">
                <p>Selling Price:</p>
                <input type="number" name="selling_price" min="0" step="any" value="<?php echo $product['selling_price'] ?? 0; ?>">

                <p>Category:</p>
                <select name="category">
                    <option value="">----</option>
                    <option value="Beverages" <?php if($product['category'] == 'Beverages') echo 'selected'; ?>>Beverages</option>
                    <option value="Snacks" <?php if($product['category'] == 'Snacks') echo 'selected'; ?>>Snacks</option>
                    <option value="Hygiene" <?php if($product['category'] == 'Hygiene') echo 'selected'; ?>>Hygiene</option>
                </select>

                <p>Expiration Date:</p>
                <input type="date" name="expiration_date" value="<?php echo $product['expiration_date'] ?? ''; ?>">
                <p>Is Active:</p>
                <input type="number" name="isActive" min="0" max="1" step="1" value="<?php echo $product['isActive'] ?? 0; ?>">

                <input type="submit" name="btnUpdateProduct" value="Update">
        </form>
</body>

<?php
if (isset($_POST['btnUpdateProduct'])) {
    $manufacturer = $_POST['manufacturer'];		
    $product_name = $_POST['product_name'];
    $quantity_in_stock = $_POST['quantity_in_stock'];
    $measurement = $_POST['measurement'];		
    $bought_price = $_POST['bought_price'];
    $selling_price = $_POST['selling_price'];		
    $category = $_POST['category'];
    $expiration_date = $_POST['expiration_date'];
    $isActive = $_POST['isActive'];

    $updateQuery = "UPDATE tblproduct SET 
        manufacturer='$manufacturer',
        product_name='$product_name',
        quantity_in_stock='$quantity_in_stock',
        measurement='$measurement',
        bought_price='$bought_price',
        selling_price='$selling_price',
        category='$category',
        expiration_date='$expiration_date',
        isActive='$isActive'
        WHERE product_id = $product_id";

    mysqli_query($connection, $updateQuery);

    echo "<script>alert('Product updated successfully!');</script>";
    header("Location: dashboard.php");
}
?>


<?php //require_once 'includes/footer.php'; ?>