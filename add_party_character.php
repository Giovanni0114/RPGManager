<?php
	$c_id = $_GET['c_id'];
	$p_id = $_GET['p_id'];

	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "INSERT INTO `tbcharacter_party`(`party_id`, `character_id`) VALUES ($c_id,'$p_id')";

	if ($db->query($query) === TRUE) {
		echo "New record created successfully";
	      } else {
		echo "Error: " . $query . "<br>" . $db->error;
	      }
	      
	      $db->close();
?>

<script>
	// window.location.assign("partys.php?id=<?php echo $id?>")
</script>