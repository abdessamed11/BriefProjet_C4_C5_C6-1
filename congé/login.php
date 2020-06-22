<?php
include("connect.php");
session_start();
if(isset($_POST['submit'])){

    //Récupérer POST ::
    $cin=htmlspecialchars(strtolower(trim($_POST['cin'])));
    $password=md5($_POST['password']);

    //Réquête
    $query = "SELECT id FROM auth WHERE login='$cin' && pwd='$password'";
    $result = mysqli_query($con,$query);
    
    if(mysqli_num_rows($result)>0){
        //Récupérer ID Login
        $row = mysqli_fetch_assoc($result);
        $query_ID = "SELECT * FROM employe WHERE id_login='$row[id]'";
        $result_id = mysqli_query($con,$query_ID);

        //Récupérer ID Employe
        $id_employe = mysqli_fetch_assoc($result_id);
    
        //Enregistre Name & ID_Employe dans la session

        $_SESSION['cin']=$cin;
        $_SESSION['id_employe']=$id_employe['id'];
        $_SESSION['nom']=$id_employe['nom'];
        $_SESSION['prenom']=$id_employe['prenom'];

        // to filter the HR department
        if($id_employe['id_service']==2)
            header("location:homeRH.php");   
        else
        header("Location:home.php");
        
        
    }else{
        echo "name ou password est faut";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>LoginIn</title>
</head>
<body>
    
<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">



           		   		<input type="text" placeholder="cin" class="input" name="cin" require>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<!-- <h5>Password</h5> -->
           		    	<input type="password" placeholder="password" class="input" name="password" require>
            	   </div>
            	</div>
                <a href="#">Forgot Password?</a>
                <button class="btn"  type=submit name="submit">LoginIn</button>
            	
            </form>


        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>