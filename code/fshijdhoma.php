<?php

    include '../inc/functions.php';
    deleteDhome($_POST['dhomaid']);
    header("Location: dhomat.php");

?>