<table id="res" style="border:none" border=1>
<tr>
    <td class="johncena"></td>
    <td><b>NAME</b></td>
    <td>Role</td>
    <td>Primary Weapon</td>
    <td>Primary Armor</td>
    
</tr>
<?php
    $db = mysqli_connect("localhost", "root", "", "rpg");

    $query = "SELECT * FROM tbclass";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
    {
        echo "<tr>";
        echo "<td class='imgtd'> <img src='img/class/".$row['class_id'].".png'></img></td>";
        echo "<td><b>".$row['class_name']."</b></td>";
        echo "<td>".$row['class_role']."</td>";
        echo "<td>".$row['main_weapon']."</td>";
        echo "<td>".$row['main_armor']."</td>";
        echo "</tr>";
    }

?>

</table>