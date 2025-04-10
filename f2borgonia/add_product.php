<?php    
    include 'connect.php';    
    //require_once 'includes/header.php'; 
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMS: Store Inventory management system</title>
    <meta name="description" content="SIMS is an easy-to-use application designed to help businesses of all sizes, 
    including small stores, efficiently track and manage their inventory.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style_add_product.css"> 
</head>
<body>
    <div>
        <form method="post">
                <h2>Add Product</h1>
                <p>Manufacturer:</p>
                <input type="text" name="manufacturer">
                <p>Name:</p>
                <input type="text" name="product_name">
                <p>Quantity in Stock:</p>
                <input type="number" name="quantity_in_stock">
                <p>Measurement:</p>
                <input type="text" name="measurement">
                <p>Bought Price:</p>
                <input type="number" name="bought_price" min="0" value="0" step="any">
                <p>Selling Price:</p>
                <input type="number" name="selling_price" min="0" value="0" step="any">

                <p>Category:</p>
                <select name="category">
                    <option value="">----</option>
                    <option value="Beverages">Beverages</option>
                    <option value="Snacks">Snacks</option>
                    <option value="Hygiene">Hygiene</option>
                </select>

                <p>Expiration Date:</p>
                <input type="date" name="expiration_date">
                <p>Is Active:</p>
                <input type="number" name="isActive" min="0" max="1" step="1" value="0">

                <input type="submit" name="btnAddProduct" value="Add">
        </form>
</body>

<?php	
	if(isset($_POST['btnAddProduct'])){		
		//retrieve data from form and save the value to a variable
		//for tblproduct
		$manufacturer = $_POST['manufacturer'];		
		$product_name = $_POST['product_name'];
		$quantity_in_stock = $_POST['quantity_in_stock'];
		$measurement = $_POST['measurement'];		
		$bought_price = $_POST['bought_price'];
        $selling_price = $_POST['selling_price'];		
		$category = $_POST['category'];
		$expiration_date = $_POST['expiration_date'];
		$isActive = $_POST['isActive'];
						
		//save data to tblproduct
		$sql1 = "Insert into tblproduct(manufacturer, product_name, quantity_in_stock, measurement, bought_price, selling_price, category, expiration_date, isActive) 
            values('".$manufacturer."','".$product_name."','".$quantity_in_stock."','".$measurement."', '".$bought_price."','".$selling_price."','".$category."', '".$expiration_date."', '".$isActive."')";

		mysqli_query($connection,$sql1);
				
		// $last_id = mysqli_insert_id($connection);
		 
		// $sql2 ="Insert into tblstudent(program, yearlevel, uid) values('".$prog."','.$yearlevel.','.$last_id.')";
		// mysqli_query($connection,$sql2);

		echo "<script language='javascript'>
			alert('New record saved.');
		      </script>";
		header("location: dashboard.php");
		
	}
		

?>


<?php //require_once 'includes/footer.php'; ?>