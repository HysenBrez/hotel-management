<?php
include '../inc/functions.php';
dbCon();
if(isset($_POST['modifikoDhome']))
{
    $file = $_FILES['image'];

    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.' , $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg' , 'jpeg' , 'png' , 'pdf');

    if(in_array($fileActualExt , $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000000){
                $fileNameNew = uniqid('' , true).".".$fileActualExt;
                $fileDestination = 'upload/' . $fileNameNew;
                move_uploaded_file($fileTmpName , $fileDestination);
                    $dhomaid = $_POST['dhomaid'];
                    $emri = $_POST['emri'];
                    $cmimi = $_POST['cmimi'];
                    $pershkrimi = $_POST['pershkrimi'];
                    editDhome($dhomaid, $emri ,$cmimi ,$fileNameNew, $pershkrimi);
                    
                    header("Location: dhomat.php");
            }else {
                echo "Your file is too big!";
            }

        }else {
            echo "There was an error uploading your file";
        }

    }else {
        echo "You can not upload files of this type";
    }

}
?>