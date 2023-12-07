<?php 
include 'config.php';
include '../assets/select_all.php';

$row=selectAll('user');
foreach($row as $rows){
//      var_dump($row);
//      die();
$counter=1;
echo '<tr>';
echo '<td>' . $counter . '</td>';
echo '<td>' . $rows['Name'] . '</td>';
echo '<td>' . $rows['Email'] . '</td>';
echo '<td>' . $rows['Address'] . '</td>';
echo '<td ><img class="img-fluid" style="max-width: 100px; max-height: 100px;" src="' . $rows['Image'] . '" alt="Image"></td>';
echo '<td>';
echo '<a href="edit_user.php?id=' . $rows['Id'] . '" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i>Edit</a>';
echo '<a href="../backend/deleteuser.php?id='.$rows['Id'] .'" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen">Delete</i></a>';
// echo '<a href="" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>';
echo ' </td>';
echo '</tr>';
}
?>