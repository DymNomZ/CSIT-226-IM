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
    <link rel="stylesheet" href="style_register.css"> 
</head>
<body>
    <div>
        <form method="post">
                <h2>Register Account</h1>
                <p>Firstname:</p>
                <input type="text" name="txtfirstname">
                <p>Lastname:</p>
                <input type="text" name="txtlastname">
                <p>Gender:</p>
                <select name="txtgender">
                    <option value="">----</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <p>User Type:</p>
                <select name="txtusertype">
                    <option value="">----</option>
                    <option value="student">Student</option>
                    <option value="employee">Employee</option>
                </select>
                <p>Username:</p>
                <input type="text" name="txtusername">
                <p>Password:</p>
                <input type="password" name="txtpassword">
                <p>Program:</p>
                <select name="txtprogram">
                    <option value="">----</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSCS">BSCS</option>
                </select>
                <p>Year Level:</p>
                <select name="txtyearlevel">
                    <option value="">----</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
				<input type="submit" name="btnRegister" value="Register">
        </form>
</body>

<?php	
	if(isset($_POST['btnRegister'])){		
		//retrieve data from form and save the value to a variable
		//for tbluser
		$fname=$_POST['txtfirstname'];		
		$lname=$_POST['txtlastname'];
		$gender=$_POST['txtgender'];
		$utype=$_POST['txtusertype'];
		$uname=$_POST['txtusername'];		
		$pword=$_POST['txtpassword'];	
		$hashedpw = password_hash($pword, PASSWORD_DEFAULT);
		
		//for tblstudent
		$prog=$_POST['txtprogram'];		
		$yearlevel=$_POST['txtyearlevel'];		
		
						
		//save data to tbluser	
		$sql1 ="Insert into tbluser(firstname,lastname,gender, usertype, username, password) values('".$fname."','".$lname."','".$gender."','".$utype."', '".$uname."', '".$hashedpw."')";
		mysqli_query($connection,$sql1);
				
		$last_id = mysqli_insert_id($connection);
		 

		if($utype == "student"){
			$sql2 ="Insert into tblstudent(program, yearlevel, uid) values('".$prog."','.$yearlevel.','.$last_id.')";
			mysqli_query($connection,$sql2);
		}

		echo "<script language='javascript'>
			alert('New record saved.');
		      </script>";
		header("location: dashboard.php");
		
			
		
	}
		

?>


<?php //require_once 'includes/footer.php'; ?>