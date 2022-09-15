<?php
   include('../connect.php');
   
    if (isset($_POST['send'])){
        $nom= $_POST["nom"];
        $prenom= $_POST["prenom"];
        $email= $_POST["email"];
        $phone= $_POST["phone"];
        $adress= $_POST["adress"];
        $sexe= $_POST["sexe"];
        $mdp= $_POST["mdp"];
    $file_name=$_FILES['photo']['name'];
    $file_tmp=$_FILES['photo']['tmp_name'];
    $file_size=$_FILES['photo']['size'];
    $file_error=$_FILES['photo']['error'];
    $file_type=$_FILES['photo']['type'];
	  
	  if(is_uploaded_file($file_tmp)){
			if($file_size < 2097152000){
				if($file_type= 'image/jpg'){
					if(move_uploaded_file($file_tmp, "../uploads/$file_name")){
						$output= '<p class="alert alert-success">file uploaded successefully</p>';
					}else{
						$output= '<p class="alert alert-success">file uploaded failed</p>';
					}
					}else{
						$output= '<p class="alert alert-success">file not image</p>';
					}
					}else{
						$output= '<p class="alert alert-success">2M only</p>';
					}
					}else{
						$output= '<p class="alert alert-success">Please select a file</p>';
					}
                 
            $query="INSERT INTO utilisateur(id,nom,prenom,sexe,email,phone,adresse,mpd,photo) 
            VALUES(NULL,'$nom','$prenom','$sexe','$email','$phone','$adress','$mdp','$file_name')";

            $send= mysqli_query($conn,$query);
            //cette fonction prend deux paramettres() et cette fonction permet d'envoyé les informations qui viennnent de la db
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
    <title>enregistrement de l'utilisateur</title>
</head>
<body>
<div class="row">
<div class=" col-lg-10  m-5">
<form action="" method="Post" enctype="multipart/form-data">
        <h1 class="text-warning"> Formulaire d'inscription de l'utilisateur</h1>
        <div class="col-lg-6">
        <small class="text-primary"> Entrez votre nom</small>
        <input type="text" name="nom" id="nom" class =form-control>
        <small class="text-primary"> Entrez votre prenom</small>
        <input type="text" name="prenom" id="prenom" class = form-control>
        <small class="text-primary"> Entrez votre email</small>
        <input type="text" name="email" id="email" class = form-control>
        <small class="text-primary"> Entrez votre phone</small>
        <input type="text" name="phone" id="phone" class = form-control>
        <small class="text-primary">Entrez votre sexe</small>
        <select name="sexe" id="sexe" class="form-control">
            <option value="M">Masculin</option>
            <option value="F">Feminin</option>
        </select>
        <small class="text-primary"> Entrez votre adresse</small>
        <textarea name="adress" id="adress" cols="30" rows="10" class="form-control">
        </textarea>
        <small class="text-primary"> Entrez votre photo</small>
        <input type="file" name="photo" id="photo" class = form-control>
        <small class="text-primary"> Entrez votre mot de pass</small>
        <input type="password" name="mdp" id="mdp" class = form-control>
        <input type="submit" value="send" name="send" class="btn-info m-2">
        </div>
</form>

<a href="login.php"> <p class="text-danger">connectez-vous</p> </a>
</div>
</div>
</body>
</html>