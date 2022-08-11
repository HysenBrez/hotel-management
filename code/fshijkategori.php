<?php

    include '../inc/functions.php';
    deleteKategorite($_POST['kategoriaid']);
    header("Location: kategorite.php");

?>