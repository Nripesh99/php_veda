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
            <a href="http://localhost:8000/user/assets/redirect.php">Home</a>
            <!-- <a href="#news">News</a>
            <a href="#contact">Contact</a> -->
            <a href="javascript:void(0)" class="icon" onclick="openNav()">&#9776;</a>
            <?php
            session_start();
            if ($_SESSION) {
                echo '<a class=" btn-danger btn-sm position-absolute top-0 end-0 mt-0" href="http://localhost:8000/user/backend/logout.php">Logout</a>';
            } else {
                echo '<a class="btn btn-success btn-sm position-absolute top-0 end-0 mt-0" href="http://localhost:8000/user/frontend/loginfile.php">Login</a>';
            }
            ?>
        </div>


    </div>

    <?php

    require_once 'selectfromuser.php';
    @include '../backend/config.php';
    @include '../../backend/config.php';
    include 'var_dump.php';
    // session_start();
    if (!empty($_SESSION['Id'])) {
        $row = select('user', 'Id', $_SESSION['Id'], 'role_id');
        $roles = implode($row);
        //getting list of permissions
        $sql_i = "SELECT `permission_id`, `role` FROM roles_permission 
        JOIN role ON role.role_id = roles_permission.role_id 
        WHERE roles_permission.role_id = $roles";
        $results = mysqli_query($connect, $sql_i);
        $permissionId = array();
        $role_name = array();
        if ($results) {
            while ($row = mysqli_fetch_assoc($results)) {
                $permissionId[] = $row['permission_id'];
                $role_name[] = $row['role'];


            }
        } else {
            echo "Error: " . mysqli_error($connect);
        }
        // Define a mapping of permission IDs to URLs
        $permissionData = array(
            'role' => array(
                // 'url' => 'http://localhost:8000/user/frontend/fetch_role',
                // 'display_name' => 'Role',
                'permissions' => array(
                    'add' => array(
                        'url' => 'http://localhost:8000/user/frontend/fetch_add_role_permission',
                        'display_name' => 'Add',
                    ),
                    'delete' => array(
                        'url' => 'http://localhost:8000/user/frontend/fetch_delete_role_permission',
                        'display_name' => 'Delete',
                    ),
                    'edit' => array(
                        'url' => 'http://localhost:8000/user/frontend/fetch_edit_role_permission',
                        'display_name' => 'Edit',
                    ),
                ),
            ),
            'permission' => array(
                // 'url' => 'http://localhost:8000/user/frontend/fetch_permission',
                // 'display_name' => 'Permission',
                'permissions' => array(
                    'add' => array(
                        'url' => 'http://localhost:8000/user/frontend/fetch_add_permission',
                        'display_name' => 'Add',
                    ),
                    'delete' => array(
                        'url' => 'http://localhost:8000/user/frontend/fetch_delete_permission',
                        'display_name' => 'Delete',
                    ),
                    'edit' => array(
                        'url' => 'http://localhost:8000/user/frontend/fetch_edit_permission',
                        'display_name' => 'Edit',
                    ),
                ),
            ),
            'user' => array(
                // 'url' => 'http://localhost:8000/user/frontend/fetch_user',
                // 'display_name' => 'User',
                'permissions' => array(
                    'add' => array(
                        'url' => 'http://localhost:8000/user/frontend/fetch_add_user',
                        'display_name' => 'Add',
                    ),
                    'delete' => array(
                        'url' => 'http://localhost:8000/user/frontend/fetch_delete_user',
                        'display_name' => 'Delete',
                    ),
                    'edit' => array(
                        'url' => 'http://localhost:8000/user/frontend/fetch_edit_user',
                        'display_name' => 'Edit',
                    ),
                ),
            ),
        );

        // Selecting permission name based on the permission id given
        $per_name = array();
        $per_slug = array();
        $per_type = array();

        foreach ($permissionId as $per_id) {
            $sqli_3 = "SELECT per_name, slug, type  FROM permission WHERE per_id = $per_id";
            $results_3 = mysqli_query($connect, $sqli_3);

            if ($results_3) {
                while ($row_3 = mysqli_fetch_assoc($results_3)) {
                    $per_name[] = $row_3['per_name'];
                    $per_slug[] = $row_3['slug'];
                    $per_type[] = $row_3['type'];


                }
            } else {
                echo "Error: " . mysqli_error($connect);
            }
        }

        // Function to generate the navbar menu based on permission names// Function to generate the navbar menu based on permissions
        function generateNavbarMenu($permissions, $per_type, $permissionData, $per_name)
        {
            $menu = '<ul>';
            foreach ($permissions as $permission) {
                // Assuming $permission is a string
                // dump($permission);
                if (is_string($permission)) {
                    if (isset($permissionData[$permission][$per_name])) {

                        $perTypeKey = $permissionData[$permission][$per_type] ?? null;
                        $perNameKey = $permissionData[$permission][$per_name] ?? null;

                        if ($perTypeKey !== null && $perNameKey !== null && isset($permissionData[$perTypeKey][$perNameKey])) {
                            $url = $permissionData[$perTypeKey][$perNameKey]['url'];
                            $displayName = $permissionData[$perTypeKey][$perNameKey]['display_name'];

                            $menu .= '<li><a href="' . $url . '">' . $displayName . '</a></li>';
                        }
                    }

                }
            }
            $menu .= '</ul>';
            return $menu;
        }





        // Generate navbar menu based on user's permissions
        $userPermissions = $permissionId;
        $navbarMenu = generateNavbarMenu($userPermissions, $per_type, $permissionData, $per_name);
        var_dump($navbarMenu);

        // Display the generated navbar menu
        // echo $navbarMenu;
    
        // Close the database connection
        mysqli_close($connect);

        ?>

        <div id="main">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <?php
                // Output the generated navbar menu
                echo $navbarMenu;
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