<?php
include("connect.php");
session_start();

$log = $_SESSION['login'];
$pass = $_SESSION['password'];
$id_log = $_SESSION['id'];
$serv = $_SESSION['service'];
// echo $id_log;
// $query_type_1 = "SELECT id FROM auth where login = '$log'";
// $id = mysqli_query($con,$query_type_1);
// if(mysqli_num_rows($id)>0){
//
// $row = mysqli_fetch_assoc($id);
// var_dump ($row);}
if(isset($_POST['signUp'])){

	$nom=htmlspecialchars(strtolower(trim($_POST['nom'])));
	$prenom=htmlspecialchars(strtolower(trim($_POST['prenom'])));
	$cin=htmlspecialchars(strtolower(trim($_POST['cin'])));
	$adresse=htmlspecialchars(strtolower(trim($_POST['adresse'])));
	$date_naissance=htmlspecialchars(strtolower(trim($_POST['date_naissance'])));
	$situa_famil=htmlspecialchars(strtolower(trim($_POST['situa_famil'])));
	$pay=htmlspecialchars(strtolower(trim($_POST['pay'])));
	$tel=htmlspecialchars(strtolower(trim($_POST['tel'])));
	$email=htmlspecialchars(strtolower(trim($_POST['email'])));
	$grade=htmlspecialchars(strtolower(trim($_POST['grade'])));
	// $id_login=htmlspecialchars(strtolower(trim($_POST['id_login'])));
	$salaire=htmlspecialchars(strtolower(trim($_POST['salaire'])));
	$date_embauche=htmlspecialchars(strtolower(trim($_POST['date_embauche'])));
	// $id_service=htmlspecialchars(strtolower(trim($_POST['id_service'])));
	$sexe=htmlspecialchars(strtolower(trim($_POST['sexe'])));
    $query = "INSERT INTO employe(nom,prenom,cin,adress,date_naissance,situa_famil,pays,tel,email,grade,id_login,salaire,date_embauche,id_service,sexe)
		VALUE('$nom','$prenom','$cin','$adresse','$date_naissance','$situa_famil','$pay','$tel','$email','$grade','$id_log','$salaire','$date_embauche','$serv','$sexe')";
		header('location:login.php');
    	if(mysqli_query($con,$query)){
     echo 'ok';
   }else{
       echo "error";
   }
}
	global	$id_log;
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<?php

	?>
</div>

<div>
	<form action="" method="post">
		<div class="container">

			<div class="row">
				<div class="col-sm-3">
					<h1>Registration</h1>
					<p>Fill up the form with correct values.</p>
					<hr class="mb-3">
					<label for="nom"><b>Nom</b></label>
					<input class="form-control" id="firstname" type="text" name="nom" required>

					<label for="prenom"><b>Prénom</b></label>
					<input class="form-control" id="lastname"  type="text" name="prenom" required>

					<label for="cin"><b>CIN</b></label>
					<input class="form-control" id="email"  type="text" name="cin" required>

					<label for="adresse"><b>Adresse</b></label>
					<input class="form-control" id="phonenumber"  type="text" name="adresse" required>

					<label for="date_naissance"><b>Date de naissance</b></label>
					<input class="form-control" id="password"  type="date" name="date_naissance" required>
					<label for="situa_famil"><b>situation familialle</b></label>
					<input class="form-control" id="password"  type="text" name="situa_famil" required>
					<label for="pay"><b>pay</b></label>
					<input class="form-control" id="password"  type="text" name="pay" required>
					<label for="tel"><b>téléphone</b></label>
					<input class="form-control" id="password"  type="number" name="tel" required>
					<label for="email"><b>email</b></label>
					<input class="form-control" id="password"  type="email" name="email" required>
					<label for="grade"><b>grade</b></label>
					<input class="form-control" id="password"  type="text" name="grade" required>
					<label for="id_login"><b>id_login</b></label>
					<input class="form-control" id="password"  type="number" name="id_login" value="<?=$id_log;?>" disabled>
					<label for="salaire"><b>salaire</b></label>
					<input class="form-control" id="password"  type="number" name="salaire" required>
					<label for="date_embauche"><b>Date d'embauche'</b></label>
					<input class="form-control" id="password"  type="date" name="date_embauche" required>
					<label for="id_service"><b>id service</b></label>
					<input class="form-control" id="password"  type="number" name="id_service" value="<?=$serv;?>" disabled>
					<label for="sexe"><b>sexe</b></label>
					<input class="form-control" id="password"  type="text" name="sexe" required>
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="register" name="signUp" value="Sign Up">
				</div>
			</div>
		</div>
	</form>
</div>

</body>
</html>
