<div id="kategori-img">
<?php
    include '../inc/header.php';
?>
</div>
<?php if(isset($_SESSION['id']) && $_SESSION['roli'] == 'Staf' || $_SESSION['roli']=='Admin') {
   }else{
    header("Location: index.php");
   } ?>

<table class="styled-table" style="margin-left: auto; margin-right: auto;">
    <thead>
        <tr>
            <th>Kategoria</th>
            <th>Pershkrimi</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $kategorite = merrKategorite();
            if($kategorite){
                while($kategoria = mysqli_fetch_assoc($kategorite)){
                    echo "<tr>";
                    echo "<td>" . $kategoria['kategoria'] . "</td>";
                    echo "<td>" . $kategoria['pershkrimi'] . "</td>";
                    echo "<td><a href='shto_modifiko_kategori.php?kategoriaid=".$kategoria['kategoriaid'] . "'><i class='fas fa-edit'></i></a></td>";

                    ?>
                        <td>
                    <form action="fshijkategori.php" method="post">
                        <input type="text" name="kategoriaid" hidden value="<?php echo $kategoria['kategoriaid']; ?>">
                        <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                        name="btnFshij" onclick="return fshijkategori()">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <script>
                                function fshijkategori() {
                                    $confirm = confirm('A jeni te sigurt qe doni ta fshini kategorine?');
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
    <a href="shto_modifiko_kategori.php" id="add_entity"><i class="fas fa-plus" style="margin-left: 62%"></i> Shto Kategori</a>
            <br><br><br><br>
    <?php
        include '../inc/footer.php'
    ?>