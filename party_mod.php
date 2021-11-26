<?php
	$stack = array();

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
			$rep = $row['reputation'];
			$wanted = $row['wanted'];
		}
	}
	else if(isset($_GET['nip'])){
		$id = $_GET['nip'];
	}
	else{
		$query = "SELECT COUNT(party_id) FROM tbparty";
    		$result = mysqli_query($db, $query);
    		while ($row = mysqli_fetch_array  ($result))
        	$id = $row['COUNT(party_id)'];
	}

	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/animation.css">
	<link rel="stylesheet" href="css/fontello.css">
	<link rel="stylesheet" href="style.css">

	<?php
		if ($edit) echo "<title>Edit $name</title>";
		else echo "<title>New Party</title>";
	?>
</head>
<body>

<a href="index.html">
	<?php
		if ($edit) echo "<h1>RPG Manager | Party Editor</h1>";
		else echo "<h1>RPG Manager | Party Creator</h1>";
	?>
</a>


<?php
if ($edit) echo "<form action='update_party.php' method='post'>";
else echo "<form action='add_party.php' method='post'>";
?>
	
	<input style="width:60%"type="text" name="name" id="name" placeholder="Name" value="<?php echo ($edit)?$name:'';?>">
	<br>
	<div style="display: inline-block;">
		<label for="p_number">Reputation</label>
		<input type="number" name="rep" style="margin-top: 0;" id="rep" value="<?php echo ($edit)?$rep:'' ?>">
	</div>
	<div style="display: inline-block;">
		<label for="wanted">Wanted</label>
		<select  name="wanted" style="margin-top: 0;" id="wanted">
			<?php 
				for ($i=0; $i < 6; $i++) { 
					echo "<option value='$i' ".(($wanted == $i)?'selected':'')." >";
					for ($j=0; $j < $i; $j++) { 
						echo "*";
					}
					echo "</option>";
				}
			?>
		</select>
	</div>
	
	<br>
	<?php
		if($edit){
			echo "<div id=cplayer>";
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
			echo "<div class='rm' onclick='del($chad_id)'>Remove</div>";
			echo "<div style='clear:both'></div>";
			array_push($stack, $chad_id);
                     }
			echo  "<select style='width: 1020px;' class='char_list_b' id='123'> <option value='0'>Character</option>";
			
			
		
			$query = "SELECT character_id, first_name, last_name FROM tbcharacter";
			$result = mysqli_query($db, $query);
			
			while ($row = mysqli_fetch_array($result)){
				if(!in_array($row['character_id'], $stack)){
					echo "<option value=".$row['character_id'].">";
					echo $row['first_name']." ".$row['last_name'];
					echo "</option>";
				}
			}
			
			echo "</select> <div class='rm' onclick='add()'> Add</div> <div style='clear:both'></div></div>";
		}
		?>

	


	<input id='hid' type="hidden" name="id" value="<?php echo $id ?>">

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
<script src="party_mod.js"> </script>
</body>
</html>