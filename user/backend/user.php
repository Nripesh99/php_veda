<?php 
include 'config.php';
// include '../assets/select_all.php';

$row=selectAll('user');
$counter=1;
foreach($row as $rows){
//      var_dump($row);
//      die();
echo '<tr>';
echo '<td>' . $counter . '</td>';
echo '<td>' . $rows['Name'] . '</td>';
echo '<td>' . $rows['Email'] . '</td>';
echo '<td>' . $rows['Address'] . '</td>';
echo '<td ><img class="img-fluid" style="max-width: 100px; max-height: 100px;" src="' . $rows['Image'] . '" alt="Image"></td>';
echo '<td>';
echo '<div class="btn-group mt-3" role="group">';
echo '<a href="edit_user.php?id=' . $rows['Id'] . '" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-toggle-on"></i> Edit</a>';
echo '<a href="#" class="btn btn-outline-secondary btn-rounded" onclick="confirmDelete(' . $rows['Id'] . ')"><i class="fas fa-pen"></i> Delete</a>';
echo '</div>';
echo '</td>';

echo '</tr>';
++$counter;
}
?>
<script>
function confirmDelete(userId) {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger"
    },
    buttonsStyling: false
  });

  swalWithBootstrapButtons.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect to the delete URL
      window.location.href = '../backend/deleteuser.php?id=' + userId;
    }
  });
}
</script>
