<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<?php
include '../assets/session.php';
include '../backend/access.php';
include '../assets/navbar2.php';
check_user_permission($allowed_permission, '5');
include '../backend/config.php';
$id = $_GET['id'];
// var_dump($_GET['id']);
$sql = "SELECT * FROM user where Id='$id'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$Name = $row['Name'];
$Email = $row['Email'];
$Password = $row['Password'];
$Address = $row['Address'];
//to check if the user with the current session can change the value or not
$for_id = $_SESSION['Id'];
$for_role = select('user', 'Id', $for_id, 'role_id');
// var_dump($for_role);
// die();
$currentRole = select('role', 'role_id', $for_role['role_id'], 'role');
// var_dump($currentRole);
// die();

// include '../assets/select_all.php';
$row_a = selectAll('role');



?>

<body>

    <div class="container mt-5">
        <form action="../backend/edituser.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Name:</label>
                <input type="text" class="form-control" name="username" id="username" value="<?php echo $Name ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $Email ?>" required>
            </div>

            <!-- <div class="mb-3">
                    <label for="passwords" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" id="passwords" required>
                </div> -->

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo $Address ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload photo:</label>
                <input type="file" class="form-control" name="file" id="file">
            </div>
            <?php if ($currentRole['role'] !== 'user') { ?>
                <div class="mb-3">
                    <label for="role" class="form-label">Change Role </label>
                    <select id="cars" name="role" class="form-select">
                        <?php
                        foreach ($row_a as $rows) { 
                            if ($rows['role'] !== 'super_admin') {
                                $selected = ($rows['role'] === $currentRole) ? 'selected' : '';
                                $disabled = ($rows['role'] === $currentRole) ? 'disabled' : '';
                                ?>
                                <option value="<?php echo $rows['role_id'] ?>" <?=$row['role_id'] === $rows['role_id'] ? 'selected' : '' ?> <?php echo $selected . $disabled; ?>>
                                    <?php echo $rows['role']; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            <?php } else { ?>
                    <div class="mb-3">
                        <label for="role" class="form-label">Change Role:</label>
                        <select id="cars" name="role" class="form-select">
                            <?php
                            foreach ($row_a as $rows) {
                                if ($rows['role'] !== 'super_admin') {
                                    $selected = ($rows['role'] === $currentRole) ? 'selected' : '';
                                    $disabled = ($rows['role'] === $currentRole) ? 'disabled' : '';
                                    ?>
                                    <option value="<?php echo $rows['role_id'] ?>" <?php echo $selected . $disabled; ?>hidden>
                                        <?php echo $rows['role']; ?>
                                    </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                <?php } ?>
            <div class="mb-3">
                <input type="text" class="form-control" name="id" id="id" value="<?php echo $row['Id'] ?>" required
                    hidden>

                <div class="mb-3 text-center">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit" id="submit">
                </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>