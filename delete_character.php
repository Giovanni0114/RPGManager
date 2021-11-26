<?php
	$id = $_GET['id'];

	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "DELETE FROM `tbcharacter` WHERE character_id=$id";	

	if ($db->query($query) === TRUE) {
		echo "Record deleted successfully";
	      } else {
		echo "Error: " . $query . "<br>" . $db->error;
	      }
	      
	      
	      $query = "DELETE FROM tbcharacter_party WHERE character_id =$id";
	      if ($db->query($query) === TRUE) {
		echo "Record deleted successfully";
	      } else {
		echo "Error: " . $query . "<br>" . $db->error;
	      }
	 
	      $db->close();



?>

<script>
	window.location.assign("characters.php?id=1")
</script>