<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<?php
include '../assets/navbar.php';
include '../backend/config.php';
// include '../assets/session.php';
session_start();
if (empty($_SESSION)) {
    header("location: ../frontend/loginfile.php");
}
$id = $_SESSION['Id'];
$sql = "SELECT * FROM user where Id='$id'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$Name = $row['Name'];
$Email = $row['Email'];
$Password = $row['Password'];
$Address = $row['Address'];



?>

<body>

    <div class="container mt-5">
        <form action="../backend/edituser.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Name:</label>
                <input type="text" class="form-control" name="username" id="username" value="<?php echo $Name ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $Email ?>" required>
            </div>

            <div class="mb-3">
                <label for="passwords" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="passwords" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo $Address ?>"
                    required>
            </div>

            <div class="mb-3 text-center">
                <input type="submit" class="btn btn-primary" value="Submit" name="submit" id="submit">
            </div>  
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>