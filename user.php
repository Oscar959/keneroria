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
<body>
<div class="row">
<div class="offset-lg-2 col-lg-10 offset-lg-2 m-5">
<form action="" method="Post" enctype="multipart/form-data">
        <h1 class="text-warning"> formulaire d'inscription de l'admit</h1>
        <div class="col-lg-6">
        <small class="text-primary"> entrez votre nom</small>
        <input type="text" name=nom id="nom" class = form-control>
        <small class="text-primary"> entrez votre prenom</small>
        <input type="text" name="prenom" id="prenom" class = form-control>
        <small class="text-primary"> entrez votre sexe</small>
        <Select name="sexe" id="sexe">
                <option value=" "> </option>
                <option value="M">Masculin</option>
            	<option value="F">Feminin</option>
        </select>
        <small class="text-primary"> entrez votre email</small>
        <input type="text" name="email" id="email" class = form-control>
        <small class="text-primary"> entrez votre phone</small>
        <input type="text" name="phone" id="phone" class = form-control>
        <small class="text-primary"> entrez votre adresse</small>
        <textarea name="adress" id="adress" cols="30" rows="10" class="form-control">
        </textarea>
        <small class="text-primary"> entrez votre photo</small>
        <input type="file" name="photo" id="photo" class = form-control>
        <small class="text-primary"> entrez votre mot de pass</small>
        <input type="password" name="mdp" id="mdp" class = form-control>
        <input type="submit" value="send" name="send" class="btn-info m-2">
        </div>
</form>

</div>
</div>
</body>
</html>