<?php    
    include 'connect.php';
    include 'readrecords.php';   
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
</head>
<body>   

    <br>
    <div>
    <h2>List of Students</h2>
        <table id="tblCustomerRecords " class="table
            table-striped table-bordered table-sm" cellspacing="0" width="100%"> 
            <thead>
                <tr> 
                    <th>ID Number</th> 
                    <th>Firstname</th> 
                    <th>Lastname</th>
                    <th>Program</th>                     
                    <th>Action</th>
                </tr> 
            </thead>  
            <tbody>
                <?php
                    while($row = $resultset->fetch_assoc()):
                    	$id = $row['uid'];
                ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $row['firstname'] ?></td>
                    <td><?php echo $row['lastname'] ?></td>
                    <td><?php echo $row['program'] ?></td> 
                    <td><button><a href="update.php">UPDATE</a></button> | <button><a href="delete.php">DELETE</a></button></td>
                </tr>
                <?php endwhile;?>
            </tbody>         
        </table>
    </div>

    <div class="button-container">
        <button><a href="addrecord.php">Add New Student</a></button>
        <button><a href="index.php">Logout</a></button>
    </div>

</body>