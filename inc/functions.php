<?php
    /** Lidhja me DB */

use LDAP\Result;

    $dbcon;
    dbCon();
    function dbCon(){
        global $dbcon;
        $dbcon = mysqli_connect('localhost' , 'root' , '' , 'hotel');
        if(!$dbcon){
            die("Lidhja me databaze deshtoj" . mysqli_error($dbcon));
        }
    }

    function login($email, $password)
    {
        global $dbcon;
        $sql = "SELECT * FROM klientet where email = '$email'";
        $result = mysqli_query($dbcon, $sql);
        if ($result) {
            $res = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) == 1) {
                if ($password === $res['fjalekalimi']) {
                    header('Location: index.php');
                    session_start();
    
                    $_SESSION['id'] = $res['klientiid'];
                    $_SESSION['emri'] = $res['emri'];
                    $_SESSION['mbiemri'] = $res['mbiemri'];
                    $_SESSION['roli'] = $res['roli'];
                } else {
                        echo "<script>alert('Email ose Password nuk eshte ne rregull!')</script>";
                }
            }
        } else {
            echo "<script>alert('Email ose Password nuk eshte ne rregull!')</script>";
        }
    }

    function register($emri, $mbiemri, $datalindjes, $nrpersonal, $telefoni ,$email, $password , $roli)
    {
        global $dbcon;
        $sql = "SELECT * FROM klientet WHERE email = '$email'";
        $result = mysqli_query($dbcon, $sql);
        if ($result) {
            if (mysqli_num_rows($result) == 0) {
                $sql = "INSERT INTO `klientet`(`emri`, `mbiemri`, `datalindjes`, `nrpersonal`, `telefoni`, `email`, `fjalekalimi` , `roli`) 
                VALUES ('$emri','$mbiemri','$datalindjes','$nrpersonal','$telefoni','$email','$password','Klient')";
                $result1 = mysqli_query($dbcon, $sql);
                if ($result1) {
                    login($email , $password);
                }
            } else {
                echo "<script>alert('Ekziston nje llogari me kete email!');</script>";
            }
        }
    }

    /** Funksionet per Rezervime */

    function merrRezervimet(){
        $klientiid = $_SESSION['id'];
        global $dbcon;
        $sql = 'SELECT *, klientet.emri AS klienti_emri , klientet.mbiemri AS klienti_mbiemri , kategorite.kategoria AS kategoria_emri , ofertat.emri AS oferta_emri , dhomat.emri AS dhoma_emri FROM rezervimet 
        INNER JOIN klientet ON klientet.klientiid=rezervimet.klientiid
        INNER JOIN kategorite ON kategorite.kategoriaid=rezervimet.kategoriaid
        INNER JOIN ofertat ON ofertat.ofertaid=rezervimet.ofertaid
        INNER JOIN dhomat ON dhomat.dhomaid = rezervimet.dhomaid';
        if(isset($_SESSION['id']) && $_SESSION['roli'] != 'Staf' && $_SESSION['roli'] != 'Admin'){
            $sql .= " WHERE klientet.klientiid=$klientiid";
        }
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function merrRezervimetID($id){
        global $dbcon;
        $sql = "SELECT * FROM rezervimet WHERE rezervimiid=$id";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function editRezervim($rezervimiID , $klientiid , $ofertaid , $kategoriaid , $dhomaid , $datarezervimit){
        global $dbcon;
        $sql = "UPDATE `rezervimet` SET `klientiid`='$klientiid',`ofertaid`='$ofertaid',`kategoriaid`='$kategoriaid',`dhomaid`='$dhomaid',
        `datarezervimit`='$datarezervimit' WHERE rezervimiid = $rezervimiID";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function deleteRezervim($id){
        global $dbcon;
        $sql = "DELETE FROM rezervimet WHERE rezervimiid=$id";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function shtoRezervim($klientiid , $ofertaid , $kategoriaid , $dhomaid , $datarezervimit){
        global $dbcon;
        $sql = "INSERT INTO `rezervimet`(`klientiid`, `ofertaid`, `kategoriaid`, `dhomaid` ,`datarezervimit`) 
        VALUES ('$klientiid','$ofertaid','$kategoriaid','$dhomaid','$datarezervimit')";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }

    /** Funksionet per Klient */

    function merrKlientet(){
        global $dbcon;
        $sql = "SELECT * FROM klientet";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function merrKlientinID($id){
        global $dbcon;
        $sql = "SELECT * FROM klientet WHERE klientiid = $id";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function editKlient($klientiid , $emri , $mbiemri , $datalindjes , $nrpersonal , $telefoni , $email , $fjalekalimi , $roli){
        global $dbcon;
        $sql = "UPDATE `klientet` SET `emri`='$emri',`mbiemri`='$mbiemri',`datalindjes`='$datalindjes',
        `nrpersonal`='$nrpersonal',`telefoni`='$telefoni',`email`='$email',`fjalekalimi`='$fjalekalimi',`roli`='$roli' WHERE klientiid = $klientiid";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function deleteKlient($id){
        global $dbcon;
        $sql = "DELETE FROM klientet WHERE klientiid = $id";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function shtoKlient($emri , $mbiemri , $datalindjes , $nrpersonal , $telefoni , $email , $fjalekalimi , $roli){
        global $dbcon;
        $sql = "INSERT INTO `klientet`(`emri`, `mbiemri`, `datalindjes`, `nrpersonal`, `telefoni`, `email`, `fjalekalimi`, `roli`) 
        VALUES ('$emri','$mbiemri','$datalindjes','$nrpersonal','$telefoni','$email','$fjalekalimi','$roli')";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }

    /** Funksionet per dhomat */

    function merrDhomat(){
        global $dbcon;
        $sql = "SELECT * FROM dhomat";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function merrDhomenID($id){
        global $dbcon;
        $sql = "SELECT * FROM dhomat WHERE dhomaid = $id";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function shtoDhome($emri , $cmimi , $image , $pershkrimi){
        global $dbcon;
        $sql = "INSERT INTO `dhomat`(`emri`, `cmimi`, `image` , `pershkrimi`) VALUES ('$emri','$cmimi', '$image' ,'$pershkrimi')";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function editDhome($dhomaid , $emri , $cmimi , $image , $pershkrimi){
        global $dbcon;
        $sql = "UPDATE `dhomat` SET `emri`='$emri',`cmimi`='$cmimi', `image`='$image' ,`pershkrimi`='$pershkrimi' WHERE dhomaid = $dhomaid";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function deleteDhome($id){
        global $dbcon;
        $sql = "DELETE FROM dhomat WHERE dhomaid = $id";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }

    /** Funskionet per oferta */
    function merrOfertat(){
        global $dbcon;
        $sql = "SELECT * FROM ofertat";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function merrOfertenID($id){
        global $dbcon;
        $sql = "SELECT * FROM ofertat WHERE ofertaid = $id";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function shtoOferte($emri , $permbajta , $cmimi){
        global $dbcon;
        $sql = "INSERT INTO `ofertat`(`emri`, `permbajtja`, `cmimi`) 
        VALUES ('$emri','$permbajta','$cmimi')";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function deleteOferte($id){
        global $dbcon;
        $sql = "DELETE FROM ofertat WHERE ofertaid = $id";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function editOferte($ofertaid , $emri , $permbajta , $cmimi){
        global $dbcon;
        $sql = "UPDATE `ofertat` SET `emri`='$emri',`permbajtja`='$permbajta',`cmimi`='$cmimi' WHERE ofertaid = $ofertaid";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }

    /** Funksionet per kategorite */
    function merrKategorite(){
        global $dbcon;
        $sql = "SELECT * FROM kategorite";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function merrKategoriteID($id){
        global $dbcon;
        $sql = "SELECT * FROM kategorite WHERE kategoriaid =$id";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function shtoKategorite($kategoria , $pershkrimi){
        global $dbcon;
        $sql = "INSERT INTO `kategorite`(`kategoria`, `pershkrimi`) VALUES ('$kategoria','$pershkrimi')";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function editKategorite($kategoriaid , $kategoria , $pershkrimi){
        global $dbcon;
        $sql = "UPDATE `kategorite` SET `kategoria`='$kategoria',`pershkrimi`='$pershkrimi' WHERE kategoriaid = $kategoriaid";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }
    function deleteKategorite($id){
        global $dbcon;
        $sql = "DELETE FROM kategorite WHERE kategoriaid = $id";
        $result = mysqli_query($dbcon , $sql);
        return $result;
    }

?>