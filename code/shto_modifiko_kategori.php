<div id="kategori-img">
<?php
    include '../inc/header.php';
?>
</div>
<?php if(isset($_SESSION['id']) && $_SESSION['roli'] == 'Staf' || $_SESSION['roli']=='Admin') {
   }else{
    header("Location: index.php");
   } ?>
<?php
    if(isset($_POST['shtoKategori'])){
        $emri = $_POST['emri'];
        $pershkrimi = $_POST['pershkrimi'];
        $res = shtoKategorite($emri , $pershkrimi);
        if($res){
            header("Location: kategorite.php");
        }
    }
    if(isset($_POST['modifikoKategori'])){
            $kategoriaid = $_GET['kategoriaid'];
            $emri = $_POST['emri'];
            $pershkrimi = $_POST['pershkrimi'];
            $res = editKategorite($kategoriaid , $emri , $pershkrimi);
            if($res){
                header("Location: kategorite.php");
            }
    }
?>



<br><br><br><br>

<?php
    if(isset($_GET['kategoriaid'])){
        $kategoria = mysqli_fetch_assoc(merrKategoriteID($_GET['kategoriaid']));
        echo " <h1 style='color:black ; text-align : center'>Forma per modifikimin e kategorise</h1>";
    }else {
        echo "<h1 style='color:black ; text-align : center'>Forma per shtimin e kategorise</h1>";
}

?>

<form class="form-style-7" method="post">
<ul>
<li>
    <label for="emri">Kategoria</label>
    <input type="text" name="emri" value="<?php if(isset($_GET['kategoriaid'])) echo $kategoria['kategoria'] ?>" maxlength="100">
</li>
<li>
    <label for="pershkrimi">Pershkrimi</label>
    <input type="text" name="pershkrimi" value="<?php if(isset($_GET['kategoriaid'])) echo $kategoria['pershkrimi'] ?>" maxlength="100">
</li>
<li>
    <?php if(isset($_GET['kategoriaid'])) : ?>
    <input type="submit" name="modifikoKategori" id="modifikoKategori" value="Modifiko Kategori">
    <?php else: ?>
    <input type="submit" name="shtoKategori" id="shtoKategori" value="Shto Kategori">
    <?php endif; ?>
</li>
</ul>
</form>

<?php
    include '../inc/footer.php'
?>