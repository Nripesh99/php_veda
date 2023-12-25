<!DOCTYPE html>
<html lang="en">
<?php

include '../assets/session.php';
include '../backend/access.php';
$permission_count = count(selectAll('permission'));

include '../backend/config.php';
include '../assets/navbar2.php';

$user_count = count(selectAll('user'));
$role_count = count(selectAll('role'));
if(isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
    echo '<div id="messages">' . $message . '</div>';
}
?>
<script>
// Automatically remove the message after 30 seconds
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        var messageElement = document.getElementById("messages");
        if (messageElement) {
            messageElement.style.display = "none";
        }
    }, 3000); // 30 seconds
});
</script>


<head>
    <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,500,600" rel="stylesheet" type="text/css">
</head>

<!-- <div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
</div> -->
<body>
   
    <div class="row ml-5 mt-5">
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-primary text-center">
                    <div class="card-body">
                        <i class="fa fa-user fa-3x mb-3"></i>
                        <h6 class="card-subtitle mb-2">Role</h6>
                        <p class="card-text">
                            <?= $role_count ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="role.php" class="card-link text-white">More Info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-primary text text-center">
                    <div class="card-body">
                        <i class="fa fa-users fa-3x mb-3"></i>
                        <h6 class="card-subtitle mb-2">User</h6>
                        <p class="card-text">
                            <?= $user_count ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="user.php" class="card-link text-white">More Info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-primary text-center">
                    <div class="card-body">
                        <i class="fa fa-user fa-3x mb-3"></i>
                        <h6 class="card-subtitle mb-2">permission</h6>
                        <p class="card-text">
                            <?= $permission_count ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="permission.php" class="card-link text-white">More Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>



</html>
