<div id="rezervim-img">
<?php  include '../inc/header.php' ?>
</div>
<?php if(isset($_SESSION['id'])) {
   }else{
    header("Location: index.php");
   } ?>

 <h1 style="font-size:56; text-align:center; color:black;">REZERVIMET</h1>

 <table class="styled-table" style="margin-left: auto; margin-right: auto;">
    <thead>
        <tr>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Oferta</th>
            <th>Kategoria</th>
            <th>Dhoma</th>
            <th>Data e rezervimit</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $rezervimet = merrRezervimet();
            if($rezervimet){
                while($rezervimi = mysqli_fetch_assoc($rezervimet)){
                    echo "<tr>";
                    echo "<td>" . $rezervimi['klienti_emri'] . "</td>";
                    echo "<td>" . $rezervimi['klienti_mbiemri'] . "</td>";
                    echo "<td>" . $rezervimi['oferta_emri'] . "</td>";
                    echo "<td>" . $rezervimi['kategoria_emri'] . "</td>";
                    echo "<td>" . $rezervimi['dhoma_emri'] . "</td>";
                    echo "<td>" . $rezervimi['datarezervimit'] . "</td>";
                    echo "<td><a href='shto_modifiko_rezervim.php?rezervimiid=".$rezervimi['rezervimiid'] . "'><i class='fas fa-edit'></i></a></td>";
                    ?>
                    <td>
                 <form action="fshij_rezervim.php" method="post">
                        <input type="text" name="rezervimiid" hidden value="<?php echo $rezervimi['rezervimiid']; ?>">
                        <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                        name="btnFshij" onclick="return fshijrezervimin()">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <script>
                                function fshijrezervimin() {
                                    $confirm = confirm('A jeni te sigurt qe doni ta fshini rezervimin?');
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
 <a href="shto_modifiko_rezervim.php" id="add_entity" style="margin-left: 66%;"><i class="fas fa-plus"></i> Shto Rezervim</a>
<br><br><br><br><br>
 <?php
    include '../inc/footer.php';
 ?>