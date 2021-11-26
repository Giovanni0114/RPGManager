<?php
	$name = $_POST['name'];
	$id = $_POST['id'];
	$rep = $_POST['rep'];
	$wanted = $_POST['wanted'];

	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "UPDATE `tbparty` SET `party_name`='$name', `reputation`=$rep, `wanted`=$wanted WHERE party_id = $id";
	
	$result = mysqli_query($db, $query);
	
	
	header("Location:partys.php?id=$id");
?>