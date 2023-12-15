<?php
include '../assets/session.php';
include '../backend/config.php';
include 'access.php';
$user_count = count(selectAll('user'));
$role_count = count(selectAll('role'));
$permission_count = count(selectAll('permission'));

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <i class="fa fa-users fa-3x mb-3"></i>
                    <h6 class="card-subtitle mb-2">User</h6>
                    <p class="card-text">
                        <?= $user_count ?>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="#" class="card-link text-white">More Info</a>
                </div>
            </div>
        </div>

        <!-- Add similar blocks for other dashboards -->
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card dashbord dashbord-blue">
                    <div class="card-body">
                        <div class="icon-section">
                            <i class="fa fa-tasks" aria-hidden="true"></i><br>
                            <small>Task</small>
                            <p>8</p>
                        </div>
                        <div class="detail-section">
                            <a href="#" class="card-link">More Info </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
