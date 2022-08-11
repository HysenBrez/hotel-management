<?php

    include '../inc/functions.php';
    deleteOferte($_POST['ofertaid']);
    header("Location: index.php");

?>