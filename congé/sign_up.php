<?php
include("connect.php");
session_start();

$query_service = "SELECT * FROM service  ";
$service = mysqli_query($con,$query_service);

if(isset($_POST['next'])){
  $login=htmlspecialchars(strtolower(trim($_POST['login'])));
  $password=md5($_POST['password']);

    $query_1 = "INSERT INTO auth(login,pwd)VALUE('$login','$password')";




    if(mysqli_query($con,$query_1)){

      // global $login , $password;
      $query_2 = "SELECT id FROM auth WHERE login='$login' && pwd='$password'";
      $result_2 = mysqli_query($con,$query_2);
      if(mysqli_num_rows($result_2)>0){
          //Récupérer ID Login
          $row_2 = mysqli_fetch_assoc($result_2);
          $_SESSION['login']=$login;
          $_SESSION['password']=$password;
          $_SESSION['id'] = $row_2['id'];

          header('location:registration.php');
          }

   }else{
       echo "error";
   }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>

</div>

<div>
	<form action="" method="post">
		<div class="container">

			<div class="row">
				<div class="col-sm-3">
					<h1>Registration</h1>
					<p>Fill up the form with correct values.</p>
					<hr class="mb-3">
					<label for="login"><b>CIN</b></label>
					<input class="form-control" id="firstname" type="text" name="login" required>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="lastname"  type="password" name="password" required>

          <label for="service"><b>Service</b></label>
					<select class="form-control" id="service"  type="text" name="service" required>

            <?php
              if(mysqli_num_rows($service)>0){
                while($row = mysqli_fetch_assoc($service)) {
                  $service_type=htmlspecialchars(trim($_POST['service']));
                  $_SESSION['service'] = $service_type;

                  ?>
                  <option value="<?=$row['id'];?>" ><?=$row["libelle"];?></option>
                  <?php
                }
              }else{
                echo "0 result";
              }

            ?>

          </select>

					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="register" name="next" value="suivant">
				</div>
			</div>
		</div>
	</form>
</div>
</body>
</html>
