<div id="klientet-img">
<?php
    include '../inc/header.php';
?>
</div>
<?php if(isset($_SESSION['id']) && $_SESSION['roli']=='Admin') {
}else {
    header("Location: index.php");
}  ?>
<table class="styled-table" style="margin-left: auto; margin-right: auto;">
    <thead>
        <tr>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Data e lindjes</th>
            <th>Nr Personal</th>
            <th>Telefoni</th>
            <th>Emaili</th>
            <th>Roli</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $klientet = merrKlientet();
            if($klientet){
                while($klienti = mysqli_fetch_assoc($klientet)){
                    echo "<tr>";
                    echo "<td>" . $klienti['emri'] . "</td>";
                    echo "<td>" . $klienti['mbiemri'] . "</td>";
                    echo "<td>" . $klienti['datalindjes'] . "</td>";
                    echo "<td>" . $klienti['nrpersonal'] . "</td>";
                    echo "<td>" . $klienti['telefoni'] . "</td>";
                    echo "<td>" . $klienti['email'] . "</td>";
                    echo "<td>" . $klienti['roli'] . "</td>";
                    echo "<td><a href='shto_modifiko_klient.php?klientiid=".$klienti['klientiid'] . "'><i class='fas fa-edit'></i></a></td>";

                    ?>
                        <td>
                    <form action="fshij_klient.php" method="post">
                        <input type="text" name="klientiid" hidden value="<?php echo $klienti['klientiid']; ?>">
    
                        <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                        name="btnFshij" onclick="return fshijklient()">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <script>
                                function fshijklient() {
                                    $confirm = confirm('A jeni te sigurt qe doni ta fshini klientin?');
                                    if ($confirm) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                }
    
                            </script>
                        </td>
                        <?php
                        echo "</tr>";
                }
            }
        ?>
    </tbody>
    </table>
    <a href="shto_modifiko_klient.php" id="add_entity"><i class="fas fa-plus" style="margin-left: 70%"></i> Shto Perdorues</a>
            <br><br><br><br>
    <?php
        include '../inc/footer.php'
    ?>