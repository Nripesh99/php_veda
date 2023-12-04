<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
<?php
session_start();
include '../assets/session.php';
include '../assets/selectfromuser.php';
$id = $_SESSION['Id'];

$row = select('user', 'Id', $id);
$image_link = '../upload/'.$row['Image'];

?>

<body>

    <div class="container border p-4 rounded shadow ">
        <div class="row">
            <div class="col-md-8">
                <div class="col-6 col-md-4">

                    <p class="h3">Name:
                        <?php echo $row['Name'] ?>
                    </p>
                    <p class="h3">Address:
                        <?php echo $row['Address'] ?>
                    </p>
                    <p class="h3">Email:
                        <?php echo $row['Email'] ?>
                    </p>
                    <p class="h3">UserType:
                        <?php echo $row['usertype'] ?>
                    </p>
                </div>
            </div>

            <div class="col-md-4">

                <img src="<?= $image_link ?>" alt="Person" class="img-thumbnail">

                <p><a href="edit_user.php?id<?php $row['Id'] ?>" class="btn btn-primary mt-4">Edit</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>