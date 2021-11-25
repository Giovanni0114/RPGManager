<?php
	$name = $_POST['name'];
	$id = $_POST['id'];


	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "UPDATE `tbparty` SET `party_name`='$name' WHERE party_id = $id";

	$result = mysqli_query($db, $query);
	header("Location:partys.php?id=$id");
?>