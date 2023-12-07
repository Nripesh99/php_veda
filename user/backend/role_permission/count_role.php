<?php
// include '../../assets/select_all.php';
// $rows=selectAll('role');
include '../config.php';
$sql="SELECT * FROM role";
$result=mysqli_query($connect,$sql);
while($row=mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>' . $counter . '</td>';
        echo '<td>' . $row['role_name'] . '</td>';
        echo '</tr>';
}
?>
