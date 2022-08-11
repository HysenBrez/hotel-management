<div id="home-bg-img">
<?php
    include "../inc/header.php";
?>
</div>
<table>
<table class="styled-table" style="margin-left: 15%; width: 1000px">
                <thead>
                    <th>Emri</th>
                    <th>Permbajta</th>
                    <th>Cmimi</th>
                    <?php  if(isset($_SESSION['id']) && ($_SESSION['roli'] == 'Staf' || $_SESSION['roli']=='Admin')) {  ?>
                    <th>Edit</th>
                    <th>Delete</th>
                    <?php  } ?>
                </thead>
                <tbody>
                    <?php
                        $ofertat = merrOfertat();
                        if($ofertat){
                            while($oferta = mysqli_fetch_assoc($ofertat)){
                                echo "<tr>";
                                echo "<td>" . $oferta['emri'] . "</td>";
                                echo "<td>" . $oferta['permbajtja'] . "</td>";
                                echo "<td>" . $oferta['cmimi'] . "</td>";
                                if(isset($_SESSION['id']) && ($_SESSION['roli'] == 'Staf' || $_SESSION['roli']=='Admin')) {
                                echo "<td><a href='shto_modifiko_oferta.php?ofertaid=".$oferta['ofertaid'] . "'><i class='fas fa-edit'></i></a></td>";

                                ?>
                                    <td>
                                <form action="fshijoferte.php" method="post">
                                    <input type="text" name="ofertaid" hidden value="<?php echo $oferta['ofertaid']; ?>">
                
                                    <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                                    name="btnFshij" onclick="return fshijoferte()">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        <script>
                                            function fshijoferte() {
                                                $confirm = confirm('A jeni te sigurt qe doni ta fshini oferten?');
                                                if ($confirm) {
                                                    return true;
                                                } else {
                                                    return false;
                                                }
                                            }
                
                                        </script>
                                        <?php }  ?>
                                    </td>
                                    <?php
                                    echo "</tr>";
                            }
                        }
                    
                    ?>
                </tbody>
            </table>
          <?php  if(isset($_SESSION['id']) && ($_SESSION['roli'] == 'Staf' || $_SESSION['roli']=='Admin')) { ?>
            <a href="shto_modifiko_oferta.php" id="add_entity"><i class="fas fa-plus" style="margin-left: 75%"></i> Shto Oferte</a>
                <?php  } ?>
<?php
    include "../inc/footer.php"
?>