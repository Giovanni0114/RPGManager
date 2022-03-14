<?php // * Connect
$db = mysqli_connect("localhost", "root", "", "rpg");

$query = "SELECT COUNT(party_id) FROM tbparty";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result))
	$count = $row['COUNT(party_id)'];

$_SESSION['pa_id'] = 1;
if (isset($_GET['id']) && $_GET['id'] < $count + 1) {
	$_SESSION['pa_id'] = $_GET['id'];
}


$query = "SELECT * FROM tbparty WHERE party_id =" . $_SESSION['pa_id'];
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result)) {
	$id = $row['party_id'];
	$name = $row['party_name'];
	$rep = $row['reputation'];
	$wanted = $row['wanted'];
}

// $query = "SELECT tbcharacter.first_name, tbcharacter.last_name, tbcharacter.character_id FROM tbcharacter JOIN tbcharacter_party ON tbcharacter.character_id = tbcharacter_party.character_id JOIN tbparty ON tbcharacter_party.party_id = tbparty.party_id WHERE tbparty.party_id=$id";
// $result = mysqli_query($db, $query);
// while ($row = mysqli_fetch_array  ($result)){

//     $p_f_name = $row['first_name'];
//     $p_l_name = $row['last_name'];
//     $p_id = $row['character_id'];
// }
?>

<?php
// * WANTED

for ($i = 0; $i < $wanted; $i++) {
	echo '<img src="img/full_star.png"> </img>';
}

for ($i = $wanted; $i < 5; $i++) {
	echo '<img src="img/empty_star.png"> </img>';
}
?>

<?php // * CHARACTERS
            $query = "SELECT tbcharacter.first_name, tbcharacter.last_name, tbcharacter.character_id, class_name FROM tbcharacter JOIN tbcharacter_party ON tbcharacter.character_id = tbcharacter_party.character_id JOIN tbparty ON tbcharacter_party.party_id = tbparty.party_id JOIN tbclass ON tbclass.class_id = tbcharacter.class_id WHERE tbparty.party_id=$id";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_array  ($result)){
        
                $p_f_name = $row['first_name'];
                $p_l_name = $row['last_name'];
                $p_id = $row['character_id'];
                $class = $row['class_name'];

                
                echo  '<a href="characters.php?id='.$p_id.'">';
                echo '<div class="place"><div class="l" style="width: 34%">';
                echo $class;
                echo '</div><div class="content" >';
                echo $p_f_name.' '.$p_l_name;
                echo "</div> </div> </a>";
            }


?>

<?php // * BUTTONS 
        if($_SESSION['pa_id'] == 1){
            echo "<input type='button' value='<<' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
        echo "<a href='partys.php?id=1'>";
        echo "<input type='button' value='<<'>";
            echo "</a>";
        }

        if($_SESSION['pa_id'] == 1){
            echo "<input type='button' value='<' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
        echo "<a href='partys.php?id=".($_SESSION['pa_id']-1)."'>";
        echo "<input type='button' value='<'>";
            echo "</a>";
        }

        if($_SESSION['pa_id'] == $count){
            echo "<input type='button' value='>' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
            echo "<a href='partys.php?id=".($_SESSION['pa_id']+1)."'>";
            echo "<input type='button' value='>'>";
            echo "</a>";
        }

        if($_SESSION['pa_id'] == $count){
            echo "<input type='button' value='>>' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
            echo "<a href='partys.php?id=".$count."'>";
            echo "<input type='button' value='>>'>";
            echo "</a>";
        }
        
        ?>

<?php // * TITLE
            for ($i = 0; $i < $count; $i++){
                echo "<a href='partys.php?id=".($i+1)."'> ";
                echo "<div class='counting ";
                if($i + 1 == $_SESSION['pa_id']) echo "selected";
                echo "'style='--mod:".(80/$count)."%;'>".($i+1)."</div>";
                echo "</a>";
            }
?>
