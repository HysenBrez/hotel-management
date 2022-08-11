<?php

    include '../inc/functions.php';
    deleteKlient($_POST['klientiid']);
    header("Location: klientet.php");

?>