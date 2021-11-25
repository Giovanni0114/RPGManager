<?php
	$edit = false;
	$db = mysqli_connect("localhost", "root", "", "rpg");

	if (isset($_GET['id'])) {
		$edit = true;

			$query = "SELECT * FROM tbparty WHERE party_id =".$_GET['id'];
			$result = mysqli_query($db, $query);
    		while ($row = mysqli_fetch_array  ($result))
    		{
			$name = $row["party_name"];
			$id = $row['party_id'];
		}
	}
	else{
		$id = $_GET['nip'];
	}

	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="style.css">

	<?php
		if ($edit) echo "<title>Edit $name</title>";
		else echo "<title>New Party</title>"
	?>
</head>
<body>

<a href="index.html">
	<?php
		if ($edit) echo "<h1>RPG Manager | Party Editor</h1>";
		else echo "<h1>RPG Manager | Party Creator</h1>"
	?>
</a>

<?PHP
if ($edit) echo "<form action='update_party.php' method='post'>";
else echo "<form action='add_party.php' method='post'>";
?>
	
	<input style="width:60%"type="text" name="name" id="name" placeholder="Name" value="<?php echo ($edit)?$name:'';?>">
	
	<br>
	<div id=cplayer>
		<?php
		if($edit){
                     $query = "SELECT tbcharacter.first_name, tbcharacter.last_name, tbcharacter.character_id FROM tbcharacter JOIN tbcharacter_party ON tbcharacter_party.character_id = tbcharacter.character_id JOIN tbparty ON tbparty.party_id = tbcharacter_party.party_id WHERE tbparty.party_id=".$id;
                     $result = mysqli_query($db, $query);
                     while ($row = mysqli_fetch_array  ($result))
                     {
                        $d = mysqli_connect("localhost", "root", "", "rpg");
                         
                         $chad_id = $row['character_id'];
                         $f = $row['first_name'];
                         $l = $row['last_name'];
                        $q = "SELECT tbclass.class_name, tbapperance.description, tbspecies.species_name FROM tbcharacter JOIN tbclass ON tbcharacter.class_id=tbclass.class_id JOIN tbspecies ON tbspecies.species_id = tbcharacter.species_id JOIN tbapperance ON tbcharacter.apperance_id = tbapperance.apperance_id  WHERE tbcharacter.character_id="   .$chad_id;
                        $r = mysqli_query($d, $q);
                        while ($ro = mysqli_fetch_array ($r))
                        {
                            $cl = $ro['class_name'];
                            $app = $ro['description'];
                            $spe = $ro['species_name'];
			    
                        }

                        echo "<div class='char_list_b'><b>$f $l</b> - $app $spe $cl</div>";
			echo "<div class='rm'> Remove</div>";
			echo "<div style='clear:both'></div>";

                     }
		}
		     	echo "<select style='width: 1020px;' class='char_list_b'>";
		     	echo "<option value='0'>Player</option>";

			$query = "SELECT character_id, first_name, last_name FROM tbcharacter";
			$result = mysqli_query($db, $query);

			while ($row = mysqli_fetch_array($result)){
				echo "<option value=".$row['player_id'].">";
				echo $row['first_name']." ".$row['last_name'];
				echo "</option>";
			}
		 	echo    "</select>";
			echo "<div class='rm'> Add</div>";
			echo "<div style='clear:both'></div>";

                ?>

	</div>
	


	<input type="hidden" name="id" value="<?php echo $id ?>">

	<a href="partys.php?id=<?php echo $id ?>">
		<input type="button" value="Cancel">
	</a>
	<input type="submit" value="Apply">
<br>
<br>
<br>
<?php
if ($edit)	
echo '<a href="delete_party.php?id='.$id.'"><input id="del" type="button" value="DELETE"></a>';

?>
</form>


<script src="script.js"> </script>
</body>
</html>