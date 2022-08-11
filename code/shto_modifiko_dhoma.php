<div id="dhomat-img">
<?php
    include '../inc/header.php';
?>
</div>
<?php if(isset($_SESSION['id']) && $_SESSION['roli'] == 'Staf' || $_SESSION['roli']=='Admin') {
}else {
    header("Location: index.php");
}  ?>

<?php

    // if(isset($_POST['shtoDhome'])){
    //     $emri = $_POST['emri'];
    //     $cmimi = $_POST['cmimi'];
    //     $image = $_POST['image'];
    //     $pershkrimi = $_POST['pershkrimi'];
    //     $res = shtoDhome($emri , $cmimi , $image ,$pershkrimi);
    //     if($res){
    //         header("Location: dhomat.php");
    //     }
    // }
    // if(isset($_POST['modifikoDhome'])){
    //         $dhomaid = $_GET['dhomaid'];
    //         $emri = $_POST['emri'];
    //         $cmimi = $_POST['cmimi'];
    //         $image = $_POST['image'];
    //         $pershkrimi = $_POST['pershkrimi'];
    //         $res = editDhome($dhomaid , $emri , $cmimi , $image , $pershkrimi);
    //         if($res){
    //             header("Location: dhomat.php");
    //         }
    // }
?>



<br><br><br><br>

<?php

if(isset($_GET['dhomaid'])){
        $dhoma = mysqli_fetch_assoc(merrDhomenID($_GET['dhomaid']));
        echo " <h1 style='color:black ; text-align : center'>Forma per modifikimin e dhomes</h1>";
    
        ?>
<form class="form-style-7" action="modifikoupload.php" method="post" enctype="multipart/form-data">
<ul>
    <li hidden>
        <label for="id">id</label>
        <input type="text" name="dhomaid" value="<?php  echo $dhoma['dhomaid'] ?>">
    </li>
<li>
    <label for="emri">Emri</label>
    <input type="text" name="emri" value="<?php if(isset($_GET['dhomaid'])) echo $dhoma['emri'] ?>" maxlength="100">
</li>
<li>
    <label for="cimim">Cmimi</label>
    <input type="text" name="cmimi" value="<?php if(isset($_GET['dhomaid'])) echo $dhoma['cmimi'] ?>">
</li>
<li>
    <label for="image">Image</label>
    <input type="file" name="image" id="image" value="<?php if(isset($_GET['dhomaid'])) echo $dhoma['image'] ?>">
</li>
<li>
    <label for="Mbiemri">Pershkrimi</label>
    <input type="text" name="pershkrimi" value="<?php if(isset($_GET['dhomaid'])) echo $dhoma['pershkrimi'] ?>" maxlength="100">
</li>
<li>
    
    <input type="submit" name="modifikoDhome" id="modifikoDhome" value="Modifiko Dhome">
   

</li>
</ul>
</form>
<?php  }else {
        echo "<h1 style='color:black ; text-align : center'>Forma per shtimin e dhomes</h1>";
 ?>

<form class="form-style-7" action="upload.php" method="post" enctype="multipart/form-data">
<ul>
<li>
    <label for="emri">Emri</label>
    <input type="text" name="emri" value="<?php if(isset($_GET['dhomaid'])) echo $dhoma['emri'] ?>" maxlength="100">
</li>
<li>
    <label for="cimim">Cmimi</label>
    <input type="text" name="cmimi" value="<?php if(isset($_GET['dhomaid'])) echo $dhoma['cmimi'] ?>">
</li>
<li>
    <label for="image">Image</label>
    <input type="file" name="image" id="image" value="<?php if(isset($_GET['dhomaid'])) echo $dhoma['image'] ?>">
</li>
<li>
    <label for="Mbiemri">Pershkrimi</label>
    <input type="text" name="pershkrimi" value="<?php if(isset($_GET['dhomaid'])) echo $dhoma['pershkrimi'] ?>" maxlength="100">
</li>
<li>

    <input type="submit" name="shtoDhome" id="shtoDhome" value="Shto Dhome">

</li>
</ul>
</form>
<?php  } ?>

<?php
    include '../inc/footer.php'
?>