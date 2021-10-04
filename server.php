<?php 


    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "people";

    $conn = new mysqli($server,$username,$password,$db);
    
    if($conn->connect_error){
    	die("Connection failed:".$conn->connect_error);
    }
    else{
    	echo("Success");
    }

    //insert Section//	
	// initialisation of variables
	$name = "";
	$address = "";
	//save operation
	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$address = $_POST['address'];

	//SQL query
		$query = "INSERT INTO info (name,address) VALUES('$name','$address')";
		mysqli_query($conn,$query);

	//redirect to index page after insertion		
	header('location: index.php');
	}
	//Display Sections//
	$sql = "select * from info";

	//Delete Section//

	if(isset($_GET['deleteid'])){
		$id = $_GET['deleteid'];
		$del = "delete from info where id = $id";
		$result = mysqli_query($conn,$del);
		if($result){
			header('location: index.php');
		}
		else{
			die(mysqli_error($conn));
		}
	}
	 




 ?>