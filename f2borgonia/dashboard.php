<?php    
    include 'connect.php';
    include 'queries.php';   
    //require_once 'includes/header.php'; 
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMS: Store Inventory management system</title>
    <meta name="description" content="SIMS is an easy-to-use application designed to help businesses of all sizes, 
    including small stores, efficiently track and manage their inventory.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style_dashboard.css"> 
    <script>
    function confirmDelete(id) {
        const confirmAction = confirm("Are you sure you want to delete this product?");
        if (confirmAction) {
            window.location.href = "delete.php?id=" + id;
        }
        return false; // prevent default button behavior
    }
    </script>
</head>
<body>   

    <br>
    <div>
    <h2>List of Products</h2>
    <h3>Number of products: <?php echo $totalProducts; ?></h3>
        <table id="tblProductRecords " class="table
            table-striped table-bordered table-sm" cellspacing="0" width="100%"> 
            <thead>
                <tr> 
                    <th>Product ID</th> 
                    <th>Store ID</th>
                    <th>Manufacturer</th> 
                    <th>Name</th> 
                    <th>Quantity in Stock</th>
                    <th>Measurement</th>                     
                    <th>Bought Price</th>
                    <th>Selling Price</th> 
                    <th>Category</th>
                    <th>Expiration Date</th>                     
                    <th>Is Active</th>
                </tr> 
            </thead>  
            <tbody>
                <?php
                    while($row = $resultset->fetch_assoc()):
                    	$product_id = $row['product_id'];
                        $store_id = $row['store_id'];
                        $manufacturer = $row['manufacturer'];
                        $product_name = $row['product_name'];
                        $quantity_in_stock = $row['quantity_in_stock'];
                        $measurement = $row['measurement'];
                        $bought_price = $row['bought_price'];
                        $selling_price = $row['selling_price'];
                        $category = $row['category'];
                        $expiration_date = $row['expiration_date'];
                        $isActive = $row['isActive'];
                ?>
                <tr>
                    <td><?php echo $product_id ?></td>
                    <td><?php echo $store_id ?></td>
                    <td><?php echo $manufacturer ?></td>
                    <td><?php echo $product_name ?></td>
                    <td><?php echo $quantity_in_stock ?></td>
                    <td><?php echo $measurement ?></td> 
                    <td><?php echo $bought_price ?></td>
                    <td><?php echo $selling_price ?></td>
                    <td><?php echo $category ?></td> 
                    <td><?php echo $expiration_date ?></td>
                    <td><?php echo $isActive ?></td>
                    <td><button><a href="update_product.php?id=<?php echo $product_id ?>">UPDATE</a></button> | <button onclick="return confirmDelete(<?php echo $product_id; ?>)">DELETE</button>
                </tr>
                <?php endwhile;?>
            </tbody>         
        </table>
    </div>

    <div class="button-container">
        <button><a href="add_product.php">Add Product</a></button>
        <button><a href="index.php">Logout</a></button>
    </div>

</body>