<?php include 'server.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD operations</title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>		
			
	<div class="container">
		<div class="row">
			<div class="col-md-4 mt-5">
				<form method="POST" action="server.php">
					<h3 class="text-center">Data Form</h3>
					<div class="form-group">
						<label>Name</label><br>
						<input type="text" name="name" class="form-control" value="<?php echo $name;?>" placeholder="Enter you name" required><br>
						<label>Address</label><br>
						<input type="text" id="name" name="address" value="<?php echo $address;?>" class="form-control" placeholder="Enter your address" required><br>
						<span class="text-center"><button type="submit" name="save" onclick="myfunction()" class="btn btn-primary mt-3">Submit</button></span>
					</div>
				</form>
			</div>
			<div class="col-md-6 mx-5 mt-5 ">
				<h3 class="text-center">Table View</h3>
				<table class="table">
					<thead class="thead-light">
						<tr>
						<th scope="col">Name</th>
						<th scope="col">Address</th>
						<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php  $result = mysqli_query($conn,$sql);
								if($result){
									
									while ($row = mysqli_fetch_assoc($result)) { 
									$id = $row['id'];   	
									$name  = $row['name'];
									$address = $row['address']; 

									echo '
											<tr>
												<td>'.$name.'</td>
												<td>'.$address.'</td>
												<td>
												<a href="edit.php? updateid= '.$id.'" class="btn btn-primary">Edit</a> |
												<a href="server.php? deleteid='.$id.'" class="btn btn-danger">Delete</a> 
												</td>
											</tr>';
									}
								}
							?>  	
  					</tbody> 
				</table>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	function myfunction(){
		alert("Are you sure to submit?");
	}
</script>
</html>
