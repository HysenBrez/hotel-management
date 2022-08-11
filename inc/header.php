<?php
    require 'functions.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- Custom Link -->
    <link rel="stylesheet" href="style.css">

    <!-- Google Fonts Link -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <title>Hotel Sample</title>
</head>
<header id="home-header">
        <!-- <div id="home-header--bg-image"> -->
            <nav class="navbar-expand-md px-md-5">
                <h1 id="icon">Hotel Sample</h1>
                <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    
                   
                <?php    if(isset($_SESSION['id']) && $_SESSION['roli']=='Admin') { ?>

                    <li class="nav-item">
                        <a href="./index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="dhomat.php" class="nav-link">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a href="reservation.php" class="nav-link">Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a href="klientet.php" class="nav-link">Klientet</a>
                    </li>
                    <li class="nav-item">
                        <a href="kategorite.php" class="nav-link">Kategorite</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php#container" class="nav-link">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                    <li><i class="fa fa-user nav-link" style="margin-top: 5px; color :aqua; font-weight:1000px;" ></i><?php echo $_SESSION['emri'] . " ". $_SESSION['mbiemri'];?></li>
                    <?php } ?>

                    <?php    if(isset($_SESSION['id']) && $_SESSION['roli']=='Staf') { ?>

                        <li class="nav-item">
                        <a href="./index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="dhomat.php" class="nav-link">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a href="reservation.php" class="nav-link">Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a href="kategorite.php" class="nav-link">Kategorite</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php#container" class="nav-link">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                    <li><i class="fa fa-user nav-link" style="margin-top: 5px; color :aqua; font-weight:1000px;" ></i><?php echo $_SESSION['emri'] . " ". $_SESSION['mbiemri']; ?></li>
                    <?php } ?>

                    <?php    if(isset($_SESSION['id']) && $_SESSION['roli']=='Klient') { ?>

                        <li class="nav-item">
                        <a href="./index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="reservation.php" class="nav-link">Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php#container" class="nav-link">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                    <li><i class="fa fa-user nav-link" style="margin-top: 5px; color :aqua; font-weight:1000px;" ></i><?php echo $_SESSION['emri'] . " ". $_SESSION['mbiemri']; ?></li>
                    <?php } ?>



                    <?php  if(!isset($_SESSION['roli'])) { ?>

                    <li class="nav-item">
                        <a href="./index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php#container" class="nav-link">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="login-register.php" class="nav-link">Login</a>
                    </li>
                    <?php  } ?>
                </ul>
            </div>
            </nav>
            <div class="home-header--title">
                <div class="container p-5">
                    <h1>Find the best deals</h1>
                    <h3 id="reservation-form">for your next trip</h3>
                </div>
            </div>
        </div>
    </header>