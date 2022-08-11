<div id="dhomat-img">
<?php
    include '../inc/header.php';
?>
</div>

<br><br><br><br>

<h1>Test</h1>

<form class="form-style-7" action="upload.php" method="post" enctype="multipart/form-data">
<ul>
<li>
    <label for="emri">Image</label>
    <input type="file" name="image" value="<?php if(isset($_GET['dhomaid'])) echo $dhoma['image'] ?>" maxlength="100">
</li>
<li>
    <label for="cimim">Image</label>
    <input type="text" name="name" value="<?php if(isset($_GET['dhomaid'])) echo $dhoma['name'] ?>">
</li>

    <input type="submit" name="shtoDhome" id="shtoDhome" value="Shto Dhome">
</ul>
</form>

<?php
    include '../inc/footer.php'
?>