<?php
 include('../connect.php');
session_start();
if (isset($_SESSION['nom']) && ($_SESSION['prenom']) && ($_SESSION['mdp'])) {
    
}else {
    echo "<script>

        setInterval(function(){
        window.location.replace('login.php');
        },1000)
        </script>";
}
    echo $nom=$_SESSION['nom'];
     echo $prenom=$_SESSION['prenom'];
    echo $mdp=$_SESSION['mdp'];
    $query= "SELECT* FROM admin WHERE nom='$nom' AND prenom='$prenom' AND mdp='$mdp' " ;

    $resultat= mysqli_query($conn,$query);
    //print_r($resultat);
    // FETCH: c'est une methode qui permet de parcourir les données 

    while ($row=mysqli_fetch_array($resultat)) {
        echo $phone=$row['phone'];
        echo $photo=$row['photo'];
        echo $email=$row['email'];
        echo $adress=$row['adress'];

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome-free/all.css">
    <title>enregistrement des articules</title>
</head>
<body class="m-5">
<div class="row">
<div class="offset-lg-2 col-lg-10 offset-lg-2 m-5">
<div class="col-md-6">
<div class="card">
<div class="text-card">
<p>Bonjour<?= $_SESSION['nom']; ?></p>
</div>
 <div class="card-body text-danger">
 Bienvenue dans la page d'ajout des articles
 <?php echo '<img src="../uploads/'.$photo.'" width="200px" height="100px" alt="" srcset="" class="img-thumbnail">'; ?>
 </div>
</div>
</div>
<div class="col-md-6">
<form action="" method="POST">
</form>
</div>
</div>
</div>
<script>
// rounded-circle: c'est une class bootstrap pour mettre l'image en ronde
$(document).ready(function(){
    //lert("great");

})
</script>
</body>
</html>