<?php
	$c_id = $_GET['c_id'];
	$p_id = $_GET['p_id'];	

	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "INSERT INTO `tbcharacter_party`(`party_id`, `character_id`) VALUES ($p_id,$c_id)";

	if ($db->query($query) === TRUE) {
		echo "New record created successfully";
	      } else {
		echo "Error: " . $query . "<br>" . $db->error;
	      }
	      
	      $db->close();

	header("partys.php?id=$p_id");
?>

<!-- <script> -->
	window.location.assign()
<!-- </script> -->