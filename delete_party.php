<?php
	$id = $_GET['id'];

	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "DELETE FROM `tbparty` WHERE party_id=$id";	

	if ($db->query($query) === TRUE) {
		echo "Record deleted successfully";
	      } else {
		echo "Error: " . $query . "<br>" . $db->error;
	      }
	      
	      $db->close();
?>

<script>
	window.location.assign("partys.php?id=1")
</script>