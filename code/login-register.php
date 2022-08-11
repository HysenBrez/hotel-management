<?php
    include '../inc/functions.php';
    session_start();
?>
<?php
    if(isset($_SESSION['id'])){
        echo "<script>
        alert('You are already logged in!');
        window.location.href='index.php';
        </script>";
    }
    ?>
<link rel="stylesheet" href="login.css">

<?php

if(isset($_POST['login'])){
    $email = $_POST['email-login'];
    $password = $_POST['password-login'];
    login($email , $password);
}
if(isset($_POST['register'])){
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$datalindjes = $_POST['datalindjes'];
	$nrpersonal = $_POST['nrpersonal'];
	$telefoni = $_POST['telefoni'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	register($emri , $mbiemri , $datalindjes , $nrpersonal , $telefoni , $email , $password , $roli);
}

?>
<form method="post">
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="email" class="label">Email</label>
					<input id="email-login" name="email-login" type="email" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="password-login" name="password-login" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" name="login" id="login" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="Emri" class="label">Emri</label>
					<input id="emri" name="emri" type="text" class="input">
				</div>
				<div class="group">
					<label for="mbiemri" class="label">Mbiemri</label>
					<input id="mbiemri" name="mbiemri" type="text" class="input">
				</div>
				<div class="group">
					<label for="datalindjes" class="label">Data e lindjes</label>
					<input id="datalindjes" name="datalindjes" type="date" class="input">
				</div>
				<div class="group">
					<label for="nrpersonal" class="label">Nr Personal</label>
					<input id="nrpersonal" name ="nrpersonal" type="text" class="input">
				</div>
				<div class="group">
					<label for="telefoni" class="label">Telefoni</label>
					<input id="telefoni" name ="telefoni" type="text" class="input">
				</div>
				<div class="group">
					<label for="email" class="label">Email</label>
					<input id="email" name ="email" type="text" class="input">
				</div>
				<div class="group">
					<label for="password" class="label">Password</label>
					<input id="password" name ="password" type="password" class="input">
				</div>
				<div class="group">
					<input type="submit" name="register" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
			</div>
		</div>
	</div>
</div>
</form>