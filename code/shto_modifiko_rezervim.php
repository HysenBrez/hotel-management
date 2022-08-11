<div id="rezervim-img">
<?php
    include '../inc/header.php';
?>
</div>

<?php if(isset($_SESSION['id'])) {
   }else{
    header("Location: index.php");
   } ?>

<?php
    if(isset($_POST['modifikoRezervim'])){
        $rezervimiID = $_GET['rezervimiid'];
        $klientiid = $_POST['klienti'];
        $ofertaid = $_POST['oferta'];
        $kategoriaid = $_POST['kategoria'];
        $dhomaid = $_POST['dhoma'];
        $datarezervimit = $_POST['datarezervimit'];
        $res = editRezervim($rezervimiID , $klientiid , $ofertaid , $kategoriaid , $dhomaid , $datarezervimit);
        if($res){
            header("Location: reservation.php");
        }
    }

    if(isset($_POST['shtoRezervim'])){
        $klientiid = $_POST['klienti'];
        $ofertaid = $_POST['oferta'];
        $kategoriaid = $_POST['kategoria'];
        $dhomaid = $_POST['dhoma'];
        $datarezervimit = $_POST['datarezervimit'];
        $res = shtoRezervim($klientiid , $ofertaid , $kategoriaid , $dhomaid , $datarezervimit);
        if($res){
            header("Location: reservation.php");
        }
    }
?>


<?php

if(isset($_GET['rezervimiid'])){
      $rezervimi = mysqli_fetch_assoc(merrRezervimetID($_GET['rezervimiid']));
echo "<h1 style='color:black ; text-align : center'>Forma per modifikimin e rezervimit</h1>";
}else {
echo "<h1 style='color:black ; text-align : center'>Forma per shtimin e rezervimit</h1>";
}

?>

<form class="form-style-7" method="post">
<ul>

    <?php  if(isset($_SESSION['id']) && $_SESSION['roli'] == 'Klient'){ ?>
<li hidden>
        <label for="klienti">Klienti</label>
        <input type="text" name="klienti" id="klienti" readonly value="<?php  if(isset($_SESSION['id'])) echo $_SESSION['id']?> ">
</li>
<?php  }else { ?>

<li>
    <label for="klienti">Klienti</label>
    <select name="klienti" id="klienti">
        <option value="">Zgjedh Klientin</option>
        <?php
            $klientet = merrKlientet();
            if($klientet){
                while($klienti = mysqli_fetch_assoc($klientet)){
                    echo  '<option value="' .$klienti['klientiid'] . '">'.$klienti['emri'] . '</option>';
                }
            }
        ?>
    </select>
</li>
<?php  } ?>
<li>
    <label for="Ofert">Oferta</label>
    <select name="oferta" id="oferta">
        <option value="">Zgjedh oferten</option>
        <?php
            $oferta = merrOfertat();
            if($oferta){
                while($ofertat = mysqli_fetch_assoc($oferta)){
                  echo  '<option value="' .$ofertat['ofertaid'] . '">'.$ofertat['emri'] . '</option>';
                }
            }
        ?>
    </select>
        </select>
    </option>
</li>
<li>
    <label for="dhoma">Dhoma</label>
    <select name="dhoma" id="dhoma">
        <option value="">Zgjedh Dhomen</option>
        <?php
            $dhomat = merrDhomat();
            if($dhomat){
                while($dhoma = mysqli_fetch_assoc($dhomat)){
                   echo '<option value="'.$dhoma['dhomaid'] .'">'.$dhoma['emri'] . '</option>';
                }
            }
        ?>
    </select>
</li>
<li>
    <label for="kategoria">Kategoria</label>
    <select name="kategoria" id="kategoria">
        <option value="">Zgjedh Kategorine</option>
        <?php
            $kategorite = merrKategorite();
            if($kategorite){
                while($kategoria = mysqli_fetch_assoc($kategorite)){
                    echo '<option value="' . $kategoria['kategoriaid'] . '">'. $kategoria['kategoria'] .'</option>';
                }
            }
        ?>
    </select>
</li>
<li>
<label for="dataerezervimit">Data e Rezervimit</label>
<input type="date" name="datarezervimit" id="datarezervimit">
</li>
<li>
    <?php  if(isset($_GET['rezervimiid'])) : ?>
    <input type="submit" name="modifikoRezervim" value="Modifiko Rezervimin">
    <?php else :?>
    <input type="submit" name="shtoRezervim" value="Shto Rezervim">
    <?php   endif;    ?>
</li>
</ul>
</form>

<?php
    include '../inc/footer.php'
?>