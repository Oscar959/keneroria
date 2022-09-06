
<?php
session_start();
include('../connect.php');

if (isset($_POST['nom'])) {
    $nom= $_POST["nom"];
    $prenom= $_POST["prenom"];
    $mdp= $_POST["mdp"];

    $query="SELECT* FROM admin WHERE nom='$nom' and prenom='$prenom' and mdp='$mdp'";
 
    $r= mysqli_query($conn,$query);
    if ($row= mysqli_num_rows($r)>0) {
        $_SESSION['nom']=$nom;
        $_SESSION['prenom']=$prenom;
        $_SESSION ['mdp']=$mdp;
        echo "<script>

        setInterval(function(){
        window.location.replace('article.php');
        },5000)
        </script>";
    }else {
        echo "tes informations ne sont pas dans la base des données; creez d'abord un compte";
    }
    
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
    <title>Document</title>
</head>
<body class="row col-md-10 ">
    <form action="" method="POST">
    <h1 class="text-primary">Formulaire de connexion</h1>

    <div class="offset-md-2 col-lg-8 offset-md-2">
    <small class="text-primary">Nom</small>
    <input type="text" name="nom" id="nom" class = form-control>
    </div>

    <div class="offset-md-2 col-lg-8 offset-md-2">
    <small class="text-primary">Prénom</small>
    <input type="text" name="prenom" id="prenom" class = form-control>
    </div>

    <div class="offset-md-2 col-lg-8 offset-md-2">
    <small class="text-primary">Mot de passe</small>
    <input type="password" name="mdp" id="mdp" class = form-control>
    </div>

    <div class="offset-md-2 col-lg-8 offset-md-2 p-2">
    <input type="submit" name="send" value="Envoyer" id="send" class ="btn btn-info">
    </div>

    </form>
</body>
</html>