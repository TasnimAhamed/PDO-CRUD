<?php
    require('DB/db.php');
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pypepro</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">

    <!--Materialize Icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!--Materialize CSS-->
    <link rel="stylesheet" href="./vendors/css/materialize.min.css">
    <!--Theme CSS File-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!--Media CSS File-->
    <link rel="stylesheet" href="./assets/css/media.css">
</head>
<body>
    <!--Main Section Start-->
    <main>
        <div class="row">
           <!--Active Side Nav-->
           <div class="sidebar hide-on-med-and-down">
                <div class="logo_content">
                    <div class="logo">
                        <img src="./assets/img/logo.png" class="responsive-img" alt="pypepro">
                        <div class="logo_name">Pypepro</div>
                    </div>
                </div>
                <ul class="nav_list">
                    <li>
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span class="link_name">Dashboard</span>
                        </a>
                    </li>
                  
                    
                    <li>
                        <a href="add_student.php">
                            <i class="material-icons">group</i>
                            <span class="link_name">Add Student</span>
                        </a>
                    </li>
                    
                    <li>
                            <i class="material-icons" id="toggleBtn">sort</i>
                    </li>
                </ul>
            </div>
           <!--Active Side Nav-->
            <div class="home_content">
                    <!--Top Nav-->
                    <div class="topNav hide-on-med-and-down	">
                        <div class="nav_content right">
                            <ul class="list-inline">
                                <li class="list-inline-item search">
                                    <input type="text" placeholder="Search">
                                    <i class="material-icons">search</i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="material-icons call">call</i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="material-icons add">add</i>
                                </li>
                                <li class="list-inline-item notifications">
                                    <i class="material-icons notification">notifications</i>
                                    <span>9</span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="question">?</span>
                                </li>
                                <li class="list-inline-item">
                                    <div class="profile_content">
                                        <div class="profile">
                                            <img src="./assets/img/admin.jpg" class="responsive-img" alt="pypepro">
                                            <div class="profile_name">
                                                <h4>Admin</h4>
                                                <p>admin@gmail.com</p>
                                            </div>
                                            <i class="material-icons right">chevron_right</i>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Top Nav-->

                

                