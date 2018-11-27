<?php 
	$con = mysqli_connect('localhost', 'root', '', 'universo');

	if (mysqli_connect_errno()) {
		echo "Error: ".mysqli_connect_error();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Universo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<style>
		body {
			font-family: 'Quicksand', sans-serif;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<h1 class="text-center">Base de Datos Universo</h1>
				<br>
				<a href="add.php" class="btn btn-success"> <i class="fa fa-plus"> Planeta </i> </a>
				<br><br>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>NOMBRE</th>
							<th>ORDEN</th>
							<th>LUNAS</th>
							<th>ACCIONES</th>
						</tr>
					</thead>
					<tbody>
				<?php 
					$sql = "SELECT * FROM planetas";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						echo "<tr>";
						echo "<td>".$row['nombre']."</td>";
						echo "<td>".$row['orden']."</td>";
						echo "<td>".$row['lunas']."</td>";
						echo "<td> <a href='show.php?id=".$row['id']."' class='btn btn-sm btn-dark'> <i class='fa fa-search'></i> </a> <a href='edit.php?id=".$row['id']."' class='btn btn-sm btn-dark'> <i class='fa fa-pen'></i> </a> <a href='delete.php?id=".$row['id']."' class='btn btn-sm btn-danger'> <i class='fa fa-trash'></i> </a></td>";
						echo "</tr>";
					}

					mysql_close($con);
				?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
