<?php
include "server.php"; // Using database connection file here

$id = $_GET['updateid']; // get id through query string

$qry = mysqli_query($conn,"select * from info where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['name'];
    $address = $_POST['address'];
	
    $edit = mysqli_query($conn,"update info set name='$name', address='$address' where id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:index.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Edit</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 mt-5">		
				<form method="POST">
					<h3 class="text-center">Update Form</h3>
					<div class="form-group">
							<label>Name</label><br>
							<input type="text" name="name" value="<?php echo $data['name'] ?>" class="form-control" placeholder="Update Name"><br>
							<label>Address</label><br>
							<input type="text" id="name" name="address" value="<?php echo $data['address'] ?>"  class="form-control" placeholder="Update Address"><br>
							<span class="text-center"><button type="submit" name="update" onclick="myfunction()" class="btn btn-secondary mt-3">Update</button></span>
						</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	function myfunction(){
		alert("Done!");
	}
</html>