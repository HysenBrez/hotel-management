<div id="klientet-img">
<?php
    include '../inc/header.php';
?>
</div>
<?php if(isset($_SESSION['id']) && $_SESSION['roli']=='Admin') {
}else {
    header("Location: index.php");
}  ?>

<?php
    if(isset($_POST['shtoKlient'])){
        $emri = $_POST['emri'];
        $mbiemri = $_POST['mbiemri'];
        $datalindjes = $_POST['datalindjes'];
        $nrpersonal = $_POST['nrpersonal'];
        $telefoni = $_POST['telefoni'];
        $email = $_POST['email'];
        $fjalekalimi = $_POST['fjalekalimi'];
        $roli = $_POST['roli'];
        $res = shtoKlient($emri , $mbiemri , $datalindjes , $nrpersonal , $telefoni , $email , $fjalekalimi , $roli);
        if($res){
            header("Location: klientet.php");
        }
    }
    if(isset($_POST['modifikoKlient'])){
            $klientiid = $_GET['klientiid'];
            $emri = $_POST['emri'];
            $mbiemri = $_POST['mbiemri'];
            $datalindjes = $_POST['datalindjes'];
            $nrpersonal = $_POST['nrpersonal'];
            $telefoni = $_POST['telefoni'];
            $email = $_POST['email'];
            $fjalekalimi = $_POST['fjalekalimi'];
            $roli = $_POST['roli'];
            $res = editKlient($klientiid , $emri , $mbiemri , $datalindjes , $nrpersonal , $telefoni , $email , $fjalekalimi , $roli);
            if($res){
                header("Location: klientet.php");
            }
    }
?>



<br><br><br><br>

<?php
    if(isset($_GET['klientiid'])){
        $klienti = mysqli_fetch_assoc(merrKlientinID($_GET['klientiid']));
        echo " <h1 style='color:black ; text-align : center'>Forma per modifikimin e klientit</h1>";
    }else {
        echo "<h1 style='color:black ; text-align : center''>Forma per shtimin e klientit</h1>";
}

?>

<form class="form-style-7" method="post">
<ul>
<li>
    <label for="emri">Emri</label>
    <input type="text" name="emri" value="<?php if(isset($_GET['klientiid'])) echo $klienti['emri'] ?>" maxlength="100">
</li>
<li>
    <label for="Mbiemri">Mbiemri</label>
    <input type="text" name="mbiemri" value="<?php if(isset($_GET['klientiid'])) echo $klienti['mbiemri'] ?>" maxlength="100">
</li>
<li>
    <label for="datalindjes">Data e lindjes</label>
    <input type="date" name="datalindjes" value="<?php if(isset($_GET['klientiid'])) echo $klienti['datalindjes'] ?>">
</li>
<li>
    <label for="nrpersonal">Nr personal</label>
    <input type="text" name="nrpersonal" value="<?php if(isset($_GET['klientiid'])) echo $klienti['nrpersonal'] ?>">
</li>
<li>
    <label for="telefoni">Telefoni</label>
    <input type="text" name="telefoni" value="<?php if(isset($_GET['klientiid'])) echo $klienti['telefoni'] ?>">
</li>
<li>
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php if(isset($_GET['klientiid'])) echo $klienti['email'] ?>">
</li>
<li>
    <label for="fjalekalimi">Fjalekalimi</label>
    <input type="password" name="fjalekalimi" value="<?php if(isset($_GET['klientiid'])) echo $klienti['fjalekalimi'] ?>">
</li>
<li>
    <label for="roli">Roli</label>
    <input type="text" name="roli" value="<?php if(isset($_GET['klientiid'])) echo $klienti['roli'] ?>">
</li>
<li>
    <?php if(isset($_GET['klientiid'])) : ?>
    <input type="submit" name="modifikoKlient" id="modifikoKlient" value="Modifiko Klientin">
    <?php else: ?>
    <input type="submit" name="shtoKlient" id="shtoKlient" value="Shto Klientin">
    <?php endif; ?>
</li>
</ul>
</form>

<?php
    include '../inc/footer.php'
?>