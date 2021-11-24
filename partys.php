<?php
$db = mysqli_connect("localhost", "root", "", "rpg");

    $query = "SELECT COUNT(party_id) FROM tbparty";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
        $count = $row['COUNT(party_id)'];

    $_SESSION['pa_id'] = 1;
    if (isset($_GET['id']) && $_GET['id'] < $count+1){
        $_SESSION['pa_id'] = $_GET['id'];
    }


    $query = "SELECT * FROM tbparty WHERE party_id =".$_SESSION['pa_id'];
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
    {
        $id = $row['party_id'];
        $name = $row['party_name'];
    }

    $query = "SELECT tbcharacter.first_name, tbcharacter.last_name, tbcharacter.character_id FROM tbcharacter JOIN tbcharacter_party ON tbcharacter.character_id = tbcharacter_party.character_id JOIN tbparty ON tbcharacter_party.party_id = tbparty.party_id WHERE tbparty.party_id=$id";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result)){

        $p_f_name = $row['first_name'];
        $p_l_name = $row['last_name'];
        $p_id = $row['character_id'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
        <?php 
            echo $name
        ?>
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.html">
        <h1>RPG Manager | Party Viewer</h1>
    </a>

    <div id="label">
        <?php
            for ($i = 0; $i < $count; $i++){
                echo "<a href='partys.php?id=".($i+1)."'> ";
                echo "<div class='counting ";
                if($i + 1 == $_SESSION['pa_id']) echo "selected";
                echo "'style='--mod:".(80/$count)."%;'>".($i+1)."</div>";
                echo "</a>";
            }
            ?>
    </div>

    <div id="contener">
        <div class="playerinfo">
        <h2>Party Info</h2>
        <div class="place">
                <div class="l">Name</div>
                <div class="content">
                    <span>
                        <?php echo $name?>
                    </span>
                </div>
                <div style="clear: both;"></div>
            </div>

        </div>
        <div class="playerinfo">
            <h2>Characters</h2>
            
            <?php
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
        </div>

    </div>


    <div id="nav">
        <a href="character_mod.php?id=<?php echo $_SESSION['pa_id'] ?>">
        <input type="button" value="EDIT" id="edit">
        <a>

        <?php 
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

        <a href="character_mod.php?nip=<?php echo $count + 1?>">
            <input type="button" value="ADD NEW" id="add">
        </a>
    </div>
<script src="script.js"> </script>
</body>
</html>