<div id="dhomat-img">
<?php
    include '../inc/header.php';
?>
</div>
<?php if(isset($_SESSION['id']) && $_SESSION['roli']=='Staf' || $_SESSION['roli']=='Admin') {
}else {
    header("Location: index.php");
}  ?>
<form action="" method="post">
<body>
    <main>
    <table style="width: 1000px;">
        <tr>
        <thead>
        <th>Emri</th>
        <th>Cmimi</th>
        <th>Dhoma</th>
        <th>Pershkrimi</th>
        </thead>
        </tr>
        <tbody>
        <?php
                   echo " <h2 style='text-align:center;'>Choose the perfect room</h2>";

    $dhomat = merrDhomat();
    if($dhomat){
        while($dhoma = mysqli_fetch_assoc($dhomat)){
            echo "<tr>";
            echo "<td>" . $dhoma['emri'] . "</td>";
            echo "<td>" . $dhoma['cmimi'] . "</td>";
            echo "<td>";
            ?>
            <img style='width:200px; display:inline; margin-top: 20px;' src="upload/<?php echo $dhoma['image']; ?>" alt="failure">
            <?php
            echo "</td>";
            echo "<td>" . $dhoma['pershkrimi'] . "</td>";
            echo "<td><a href='shto_modifiko_dhoma.php?dhomaid=".$dhoma['dhomaid'] . "'><i class='fas fa-edit'></i></a></td>";
            ?>
            <td>
            </td>
            <td>
         <form action="fshijdhoma.php" method="post">
                <input type="text" name="dhomaid" hidden value="<?php echo $dhoma['dhomaid']; ?>">
                <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                name="btnFshij" onclick="return fshijdhome()">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    <script>
                        function fshijdhome() {
                            $confirm = confirm('A jeni te sigurt qe doni ta fshini dhomen?');
                            if ($confirm) {
                                return true;
                            } else {
                                return false;
                            }
                        }

                    </script>
                    <?php
                    echo "</tr>";
        }   
    }
          ?>
    </tbody>
</table>
 



    <a href="shto_modifiko_dhoma.php" id="add_entity"><i class="fas fa-plus" style="margin-left: 62%"></i> Shto Dhome</a>
            <br><br><br><br>
    <?php
        include '../inc/footer.php'
    ?>