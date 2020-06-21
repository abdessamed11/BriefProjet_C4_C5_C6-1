<?php

include("connect.php");
session_start();
if (!isset($_SESSION ['name']))
    header ('location:login.php');    



//Remplir La liste
$query_type = "SELECT * FROM demande_conge ";


$result = mysqli_query($con,$query_type);

if(isset($_GET['accept_user'])){
    $id_selc = $_GET['accept_user'];
    $query_acc = "UPDATE demande_conge SET decision = 'Accepted' where id = $id_selc ";
    $accepter = mysqli_query($con,$query_acc);
    header("location: resultatrh.php");
    if($accepter)
    echo ('bien');
    else
    echo ('erreur');
}
if(isset($_GET['delete_user'])){
  $id = $_GET['delete_user'];
  global $con;
  
  $sql = "DELETE FROM `demande_conge` WHERE id = $id";
  $res = mysqli_query($con,$sql);
  header("location: resultatrh.php");
  echo 'suprimer';
}
if(isset($_GET['refuse_user'])){
    $id_selc = $_GET['refuse_user'];
    $query_acc = "UPDATE demande_conge SET decision = 'Refused' where id = $id_selc ";
    $refuser = mysqli_query($con,$query_acc);
    header("location: resultatrh.php");
    if($refuser)
    echo ('bien');
    else
    echo ('erreur');
}
if(isset($_POST['precedent']))
    header("location: homeRH.php");

if(isset($_POST['déconnecté'])){
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>resultat</title>
</head>
<body>
<table class="table2" border=1>
<tr>
            <td class="td1">id</td>
            <td class="td1">id employer</td>
            <td class="td1">nom</td>
            <td class="td1">prénom</td>
            <td class="td1">date de debut</td>
            <td class="td1">date de fin</td>
            <td class="td1">Date de demande</td>
            <td class="td1">Decision</td>
            <td class="td1">Resultat</td>
        </tr>
<?php if(mysqli_num_rows($result)>0 ) : ?>



    <?php  while($row = mysqli_fetch_assoc($result) ) : ?>
      <tr>
        <td><?=$row['id'];?></td>
        <td><?=$row['id_employe'];?></td>
        <td><?=$row['nom'];?></td>
        <td><?=$row['prenom'];?></td>
        <td><?=$row['date_debut'];?></td>
        <td><?=$row['date_fin'];?></td>
        <td><?=$row['date_demande'];?></td>

        <!-- <td><a href="resultatrh.php?delete_user=<?=$row['id'];?> ">Suprimer</a></td> -->
        <td><a class="accept" href="resultatrh.php?accept_user=<?=$row['id'];?> ">Accepter</a> <a class="refus" href="resultatrh.php?refuse_user=<?=$row['id'];?> ">Refuser</a></td>
        <td><?=$row['decision'];?></td>
      </tr>
    <?php endwhile; ?>

<?php else : ?>
    echo "0 result";

<?php endif; ?>


        <?php
        include("connect.php");
            $r=mysqli_query($con,"select * from demande_conge where id=1")
        ?>
    </table>
    <form action="" method="post">
        <input class="btn1" type="submit" name="precedent" value="précédent">
        <input class="btn2" type="submit" name="déconnecté" value="déconnecté">
    </form>

</body>
</html>
