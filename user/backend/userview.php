<?php
include 'config.php';
$sql = "SELECT `Id`, `Name`, `Email`,  `Address`, `usertype`, `Image` FROM `user`";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
    $counter = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="border p-3">';
        echo '<h1 class="mt-5">'. $row['Name'] .'</h1>';
        echo '<div class="row">';
        echo '  <div class="col-md-6">';
        echo '    <a href="#">';
        echo '      <img class="img-fluid rounded mb-3 mb-md-0" src="'.$row['Image'].'" alt="">';
        echo '    </a>';
        echo '  </div>';
        echo '  <div class="col-md-5">';
        echo '    <h3> User Type =' . $row['usertype'] .'  </h3>';
        echo '    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>';
        echo '    <a class="btn btn-primary" href="../frontend/detailview.php/Id=' . $row['Id'] . '">View More</a>';

        echo '  </div>';
        echo '</div>';
        echo '</div>';  
        $counter ++;


    }
}
?>