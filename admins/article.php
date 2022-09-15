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
     $nom=$_SESSION['nom'];
     $prenom=$_SESSION['prenom'];
     $mdp=$_SESSION['mdp'];
    $query= "SELECT* FROM admin WHERE nom='$nom' AND prenom='$prenom' AND mdp='$mdp' " ;

    $resultat= mysqli_query($conn,$query);
    //print_r($resultat);
    // FETCH: c'est une methode qui permet de parcourir les listes des données 

    while ($row=mysqli_fetch_array($resultat)) {
         $phone=$row['phone'];
         $photo=$row['photo'];
         $email=$row['email'];
         $adress=$row['adress'];

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
<p>Bonjour  <?= $_SESSION['nom']; ?></p>
</div>
 <div class="card-body text-danger">
 Bienvenue dans la page d'ajout des articles
 <?php echo '<img src="../uploads/'.$photo.'" width="200px" height="100px" alt="" srcset="" class="img-thumbnail">'; ?>
 </div>
</div>
</div>
<div class="col-md-6">
<form id="form-articles">
    <div class="col-md-6">
        <small class="text-mute text-secondary">Entrez lz titre de l'article</small>
        <input type="text" name="titre" id="titre" class="form-control">

        <small class="text-mute text-secondary">Entrez le commentaire  de l'article</small>
        <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>

        <div id="select-categories">
            <select name="categories" id="categories" class="form-control m-2">
                <?php
//on a crée cette requette pour faire fonctionner la liste de choix qui est dans la base de données, disons pour dinamiser notre site
                $query = mysqli_query($conn, "SELECT * FROM categories");
                $out = "";
                while($res = mysqli_fetch_array($query)){
                    $out .="
                     <option value=".$res['id']." class='form-control'>".$res['libelle']."</option>
                    ";

                }
                echo $out;
                ?>     
                
                
                
            </select>

            <select name="s_categories" id="s_categories" class="form-control" style='display:none'>

            </select>
            <input type="file" name="files" id="files">
            <input type="submit" value="send" name="send" class="btn btn-info m-2">


        </div>
    </div>
</form>

<div class="text-danger" id="show">

</div>
</div>
</div>
</div>
<script src="../vendor/jquery/jquery.min.js"></script>
<script>
// ready : c'est une fonction qui s'execution après le chargement de la page 
// $(document): ça permet de parcourir le document(en html on appel le page)
// rounded-circle: c'est une class bootstrap pour mettre l'image en ronde
$(document).ready(function(){
    //alert("abiga est guerit");
    $(document).on('change','#categories',function(){
        //alert('salut eumy');
        var id=$('#categories').val();
        //alert(id);
        //on a créer ajax c'est une methode de javascript qui sert interroger le serveur sans pourtant actualiser la page ça se fait de façon ensecrone 
        $.ajax({
            url:"sous_categories.php", //url de la page qui va executer au serveur
            method:"POST", //methode d'envoie
            data:{data:id}, //données qu'on envoie
            success:function(data){ //fonction signalant la réussite de la requette ajax
                $('#s_categories').css('display','block');
                $('#s_categories').html(data);

            }

        })
    });
    //preventDefault= permet d'empeche l'envoie automatique du formulaire
$(document).on('submit','#form-articles', function(e){
    e.preventDefault();
    // alert("bonjour");
     $.ajax({
        url:"article_send.php",
        method:"POST",
         //this permet de recuperer toutes les données envoyées dans la base des données
        data: new FormData(this),
        cache:false,
        contentType:false,
        processData:false,
        success:function(data){
            $('#show').html(data);
            $('#form-articles')[0].reset();
        }
     })
    

})
})
</script>
</body>
</html>