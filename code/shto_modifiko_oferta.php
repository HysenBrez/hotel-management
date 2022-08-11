<div id="home-bg-img">
    <?php
    include '../inc/header.php';
    ?>
    </div>
<?php if(isset($_SESSION['id']) && $_SESSION['roli'] == 'Staf' || $_SESSION['roli']=='Admin') {
}else {
    header("Location: index.php");
}  ?>

<?php
    if(isset($_POST['shtoOferte'])){
        $emri = $_POST['emri'];
        $permbajtja = $_POST['permbajtja'];
        $cmimi = $_POST['cmimi'];
        $res = shtoOferte($emri , $permbajtja , $cmimi);
        if ($res) {
            header('Location: index.php#container');
        }
    }
    if(isset($_POST['modifikoOferte'])){
            $ofertaid = $_GET['ofertaid'];
            $emri = $_POST['emri'];
            $cmimi = $_POST['cmimi'];
            $permbajtja = $_POST['permbajtja'];
            $res = editOferte($ofertaid , $emri , $permbajtja , $cmimi);
            if ($res) {
                header('Location: index.php#container');
            }
    }
?>



<br><br><br><br>

<?php
    if(isset($_GET['ofertaid'])){
        $oferta = mysqli_fetch_assoc(merrOfertenID($_GET['ofertaid']));
        echo " <h1 style='color:black ; text-align : center'>Forma per modifikimin e ofertes</h1>";
    }else {
        echo "<h1 style='color:black ; text-align : center'>Forma per shtimin e ofertes</h1>";
}

?>

<form class="form-style-7" method="post">
<ul>
<li>
    <label for="emri">Emri</label>
    <input type="text" name="emri" value="<?php if(isset($_GET['ofertaid'])) echo $oferta['emri'] ?>" maxlength="100">
</li>
<li>
    <label for="Mbiemri">Permbajtja</label>
    <input type="text" name="permbajtja" value="<?php if(isset($_GET['ofertaid'])) echo $oferta['permbajtja'] ?>" maxlength="100">
</li>
<li>
    <label for="cimim">Cmimi</label>
    <input type="text" name="cmimi" value="<?php if(isset($_GET['ofertaid'])) echo $oferta['cmimi'] ?>">
</li>
<li>
    <?php if(isset($_GET['ofertaid'])) : ?>
    <input type="submit" name="modifikoOferte" id="modifikoOferte" value="Modifiko oferte">
    <?php else: ?>
    <input type="submit" name="shtoOferte" id="shtoOferte" value="Shto oferte">
    <?php endif; ?>
</li>
</ul>
</form>

<?php
    include '../inc/footer.php'
?>