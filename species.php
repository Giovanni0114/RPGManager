<table id="res" style="border:none" border=1>
<tr>
    <td class="johncena"></td>
    <td><b>NAME</b></td>
    <td>Average <br> Height (cm)</td>
    <td>Average <br> Weight (kg)</td>
    
</tr>

<?php
    $db = mysqli_connect("localhost", "root", "", "rpg");
//     mysqli_select_db("rpg");

    $query = "SELECT * FROM tbspecies";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
    {
        echo "<tr>";
        echo "<td class='imgtd'> <img src='img/species/".$row['species_id'].".png'></img></td>";
        echo "<td><b>".$row['species_name']."</b></td>";
        echo "<td>".$row['avg_height']."</td>";
        echo "<td>".$row['avg_weight']."</td>";
        echo "</tr>";
    }

?>

</table>