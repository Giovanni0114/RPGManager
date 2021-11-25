<?php
	$id = $_POST['id'];
	$name = $_POST['name'];

	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "INSERT INTO `tbparty`(`party_id`, `party_name`) VALUES ($id,'$name')";

	if ($db->query($query) === TRUE) {
		echo "New record created successfully";
	      } else {
		echo "Error: " . $query . "<br>" . $db->error;
	      }
	      
	      $db->close();
?>

<script>
	window.location.assign("partys.php?id=<?php echo $id?>")
</script>