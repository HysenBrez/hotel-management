<?php

    include '../inc/functions.php';
    deleteRezervim($_POST['rezervimiid']);
    header("Location: reservation.php");

?>