<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: "Lato", sans-serif;
            margin: 0;

        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

    <div class="topnav">
        <div class="d-flex justify-content-center">
            <a href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a href="javascript:void(0)" class="icon" onclick="openNav()">&#9776;</a>
            <?php
            if ($_SESSION) {
                echo '<a class=" btn-danger btn-sm position-absolute top-0 end-0 mt-0" href="../backend/logout.php">Logout</a>';
            } else {
                echo '<a class="btn btn-success btn-sm position-absolute top-0 end-0 mt-0" href="../frontend/loginfile.php">Login</a>';
            }
            ?>
            </div>


    </div>

    <?php

    require_once 'selectfromuser.php';
    if (!empty($_SESSION)) {
        $row = select('user', 'Id', $_SESSION['Id'], 'role_id');

        $roleLinks = [
            '3' => [
                ['label' => 'Home', 'url' => 'admin_dashboard.php'],
                ['label' => 'User', 'url' => 'user.php'],
                ['label' => 'Roles', 'url' => 'role.php'],
                ['label' => 'Permission', 'url' => 'permission.php'],
            ],
            '2' => [
                ['label' => 'About', 'url' => 'about.php'],
                ['label' => 'Services', 'url' => 'services.php'],
                ['label' => 'Contact', 'url' => 'contact.php'],
            ],
            '1' => [
                ['label' => 'About', 'url' => 'about.php'],
                ['label' => 'Contact', 'url' => 'contact.php'],
            ],
            // Add more roles as needed
        ];

        // Set default links for unknown roles
        $defaultLinks = [
            ['label' => 'About', 'url' => 'about.php'],
            ['label' => 'Services', 'url' => 'services.php'],
            ['label' => 'Clients', 'url' => 'clients.php'],
            ['label' => 'Contact', 'url' => 'contact.php'],
        ];

        // Determine the links based on the user's role
        $userLinks = isset($roleLinks[$row['role_id']]) ? $roleLinks[$row['role_id']] : $defaultLinks;

        ?>

        <div id="main">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <?php
                // Output the navigation links
                foreach ($userLinks as $link) {
                    echo '<a href="' . $link['url'] . '">' . $link['label'] . '</a>';
                }
                ?>
            </div>

            <?php
    } else {

        echo '<div id="mySidenav" class="sidenav">';
        echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
        echo '<a href="#">About</a>';
        echo '<a href="#">Services</a>';
        echo '<a href="#">Clients</a>';
        echo '<a href="#">Contact</a>';
        echo '</div>';
    }

    ?>


        <!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> -->


        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>