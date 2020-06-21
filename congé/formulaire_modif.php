<?php
//test
include("connect.php");
session_start();
if (!isset($_SESSION ['name']))
    header ('location:login.php');   
// echo $_SESSION['name'];
//Remplir La liste
$query_type = "SELECT * FROM type_conge";
$result = mysqli_query($con,$query_type);
$id_modif = $_SESSION['id_modif'];

/////////////////////////////


//Formulaire
if(isset($_POST['Valider']))
{
  $date_debut=htmlspecialchars(trim($_POST['date_debut']));
  $date_fin=htmlspecialchars(trim($_POST['date_fin']));

  //Date de demande ::
  $date_demande=date("Y-m-d");
  $id_employe= $_SESSION['id_employe'];
  $nom = $_SESSION['nom'];
  $prenom = $_SESSION['prenom'];
  $type_congé=htmlspecialchars(trim($_POST['pets']));
  $query_dcongé = "UPDATE demande_conge SET date_debut = '$date_debut', date_fin = '$date_fin', date_demande = '$date_demande' WHERE id = '$id_modif' ";

    if(mysqli_query($con,$query_dcongé)){
        echo "la demande est modifié";
    }
    header("Location:resultat.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="Style.css"> -->
    <link rel="stylesheet" type="text/css" href="css/formulaire.css">
    <title>cp</title>
</head>
<body>
<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Modifier la demande de congé</h2>
				<div>
        <form action="" method="POST">
					<label for="date_debut">date debut*</label><br>
					<input id='date_debut' class="field" type="date" name="date_debut" ><br><br>
				  </div>
				  <div>
					<label for="date_fin">date fin*</label><br>
					<input id='date_fin' class="field" type="date" name="date_fin" ><br><br>
				  </div>
				  <div>
				  <div>
					<label for="matricule">id employe*</label><br>
					<input class="field" type="text" name="id_employe" placeholder="<?=$_SESSION['id_employe'];?>" disabled><br><br>
				  </div>
				  <div>
					<label for="type_conge">Type de congé*</label><br>


        <select class="field" name="pets" id="pet-select">
        <?php
          if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)) {
              ?>
              <option value="<?=$row['id'];?>" ><?=$row["libelle"];?></option>
              <?php
            }
          }else{
            echo "0 result";
          }
        ?>
        </select>

        </div>
					  
					  <div>
					   <button class="btn" type="submit" name="Valider">Valider</button><br><br>
					  </div>
					  <div>
					   <button class="btn" type="submit" name="déconnecté">déconnecté</button>
					  </div>
			</form>
			</div>
		</div>
	</div>
</body>

</html>
