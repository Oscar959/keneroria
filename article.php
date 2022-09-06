<?php
include('connect.php');

if (isset($_POST['send'])) {
    $titre=$_POST['titre'];
    $comment=$_POST['commentaire'];
    $date_pub=$_POST['date_pub'];
    $admin=$_POST['admin'];

    $query= "INSERT INTO articles(id,titre,commentaire,date_pub,admin_id) 
    VALUES(NULL,'$titre','$comment','$date_pub','$admin')";

    $result= mysqli_query($conn,$query);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/all.css">
    <title>kenerozia</title>
</head>
<body class="bg-dark">
<div class="row">
<div class="offset-lg-2 col-lg-10 offset-lg-2 m-5">
<form action="" method="Post" enctype="multipart/form-data">
        <h1 class="text-warning"> formulaire des articles</h1>
        <div class="col-lg-6">
        <small class="text-primary"> entrez un titre</small>
        <input type="text" name="titre" id="titre" class = form-control>
        <small class="text-primary"> entrez votre commentaire</small>
        <textarea name="commentaire" id="commentaire" cols="30" rows="10" class="form-control">
        </textarea>
        <small class="text-primary"> entrez votre votre date de la publication</small>
        <input type="date" name="date_pub" id="date_pub" class = form-control>
        <small class="text-primary"> entrez votre administrateur</small>
        <Select name="admin" id="admin" class = form-control>
                <option value=" ">  </option>
                <option value="M">LOKUTA Faustin</option>
            	<option value="F">NYANDAKO Ruth</option>
        </select>
        <input type="submit" value="send" name="send" class="btn btn-primary m-2">
        </div>
</form>
</div>
</div>
<script>
$(document).ready(function(){
    //lert("great");

})
</script>
</body>
</html>