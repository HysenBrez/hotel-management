<?php
    include '../inc/functions.php';
    dbCon();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
        </tr>
        <?php
        
        $i=1;
        $rows = mysqli_query($dbcon , "SELECT * FROM images ORDER BY id DESC");
        ?>
        <?php  foreach($rows as $row) : ?>
            <td><?php  echo $i++; ?></td>
            <td><?php  echo $row['name'];  ?></td>
            <td> <img src="upload/<?php echo $row['image']; ?>" width = 200 alt="failure"> </td>
        </tr>
        <?php  endforeach;  ?>
    </table>
</body>
</html>