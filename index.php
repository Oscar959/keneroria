<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/all.css">
    <title>Kenerozia</title>
</head>

<body class="bg-dark">
<div class="row">
<div class="offset-lg-2 col-lg-10 offset-lg-2 m-5">
<form action="treatform" method="Post">
<h1 class="text-warning">Formulaire d'inscription de l'admnin</h1>
<div class="col-lg-6">
<small class="text-primary"> Entrez votre nom</small>
<input type="text" name="nom" id="nom" class="form-control">

<small class="text-primary"> Entrez votre prenom</small>
<input type="text" name="prenom" id="prenom" class="form-control">

<small class="text-primary"> Entrez votre email</small>
<input type="text" name="email" id="email" class="form-control">

<small class="text-primary"> Entrez votre phone</small>
<input type="text" name="phone" id="phone" class="form-control">

<small class="text-primary"> Entrez votre adresse</small>
<textarea name="adress" id="adress" cols="30" rows="10" class="form-control">
</textarea>
<textarea name="" id="adress" cols="30" rows="10" class="form-control"></textarea>

<small class="text-primary"> Entrez votre photo</small>
<input type="file" name="photo" id="photo" class="form-control">

<small class="text-primary"> Entrez votre mot de passe</small>
<input type="password" name="mdp" id="mdp" class="form-control">

<input type="submit" id="Send" class="btn btn-info m-2">
</div>
</form>

</div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
    //lert("great");
    // ready c'est un evenement qui s'execute
    //Les evenements java script:
    // Keyup:
    // keydown:
    // Submit:
    // Focus:
    // Change:
    // dbclick:
    //DOm: document object modal
    //git init
    // git status
    // git * ou soit on peut ajouter par fichier
    // git commit -m 

})
</script>
</body>

</html>