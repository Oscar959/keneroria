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
    $query= "SELECT* FROM utilisateur WHERE nom='$nom' AND prenom='$prenom' AND mpd='$mdp' " ;

    $resultat= mysqli_query($conn,$query);
    //print_r($resultat);
    // FETCH: c'est une methode qui permet de parcourir les listes des données 

    while ($row=mysqli_fetch_array($resultat)) {
         $phone=$row['phone'];
         $photo=$row['photo'];
         $email=$row['email'];
         $adress=$row['adresse'];

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
    <style>
        *{
            font-family:verdana;
        }
    </style>
</head>
<body class=" m-5">
    <div class="card">
        <div class="header-card">
            <h3>Bienvenue dans votre page utilisateur cher(e)<?=$nom?>  <?=$prenom?></h3>
            <?php echo '<img src="../uploads/'.$photo.'" width="200px" height="100px" alt="" srcset="" class="img-thumbnail">'; ?>
        </div>

        <div class="card-body">
            <form id="recuperer_categrories">
                <h5>Choisissez un article par rapport a vos choix</h5>
                <select name="categories" id="categories" class="form-control">
                <?php
            //on a crée cette requette pour faire fonctionner la liste de choix qui est dans la base de données, disons pour dinamiser notre site
                $query = mysqli_query($conn, "SELECT * FROM categories");
                $out = "";
                while($res = mysqli_fetch_array($query)){
                    $out .="
                     <option value=".$res['id']." class='form-control m-2'>".$res['libelle']."</option>
                    ";

                }
                echo $out;
                ?>     
                </select>

                <select name="s_categories" id="s_categories" class="form-control" style='display:none'>

                </select>
            </form>

            
        </div>

        <div class="card-body tabeau-articles">
            <table class="table table-striped table-bordered">
                <thead class="bg-warning">
                    <th class="fst-italic">titre</th>
                    <th class="fst-italic">lire plus</th>
                </thead>

                <tbody>
                    <tr id="tableau-titre">

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card articles-display border-success text-center" style="display:none">

    </div>




    
</body>
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
            url:"../admins/sous_categories.php", //url de la page qui va executer au serveur
            method:"POST", //methode d'envoie
            data:{data:id}, //données qu'on envoie
            success:function(data){ //fonction signalant la réussite de la requette ajax
                $('#s_categories').css('display','block');
                $('#s_categories').html(data);
                recuperer();

            }

        })
    });
    //preventDefault= permet d'empeche l'envoie automatique du formulaire

function recuperer(){
    var id=$('#categories').val();
    var id1=$('#s_categories').val();
    //alert(id);
    //alert(id1);
   $.ajax({
            url:"categories_users.php",
            method:"POST",
            data:{categories:id, s_categories:id1},
            success:function(data){
                $("#tableau-titre").html(data);
            }
        });
}
        
   $(document).on('click', '.more', function(){
        var id= $(this).attr("id");
        recuperer_article();
        function recuperer_article(){
            $.ajax({
                url:"categories_users.php",
                method:"GET",
                data:{articles:id,},
                success:function(data){
                    $(".tabeau-articles").css("display", "none");
                    $(".articles-display").css("display", "block");
                    $(".articles-display").html(data);
                }
            });
        }
   });

})
</script>
</html>