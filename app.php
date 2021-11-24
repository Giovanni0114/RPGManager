<table id="res" style="border:none" border=1>
<tr>

    <td><b>Name</b></td>
    <td>Charisma Mod</td>
    <td>Intimidation Mod</td>
    <td>Seduction Mod</td>
    
</tr>
<?php
    $db = mysqli_connect("localhost", "root", "", "rpg");
//     mysqli_select_db("rpg");

    $query = "SELECT description, charisma, intimidation, seduction FROM tbapperance";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
    {
        echo "<tr>";
        echo "<td><b>".$row['description']."</b></td>";
        echo "<td>".$row['charisma']."</td>";
        echo "<td>".$row['intimidation']."</td>";
        echo "<td>".$row['seduction']."</td>";
        echo "</tr>";
    }

?>

</table>