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
$output = "";
    $nom=$_SESSION['nom'];
    $prenom=$_SESSION['prenom'];
    $mdp=$_SESSION['mdp'];
   $query= "SELECT* FROM utilisateur WHERE nom='$nom' AND prenom='$prenom' AND mpd='$mdp' " ;

   $resultat= mysqli_query($conn,$query);
   //print_r($resultat);
   // FETCH: c'est une methode qui permet de parcourir les listes des données 

   while ($row=mysqli_fetch_array($resultat)) {
        $id_user = $row['id'];
        $phone=$row['phone'];
        $photo=$row['photo'];
        $email=$row['email'];
        $adress=$row['adresse'];

   }
if(isset($_POST['categories'])){
    $categories= $_POST['categories'];
    $s_categories= $_POST['s_categories'];
    $out = "";

    $send1= mysqli_query($conn, "SELECT * FROM articles WHERE categories_id='$categories' 
    AND sous_categories_id ='$s_categories'");
    
    while($send=mysqli_fetch_array($send1)){
        $out .= "
            <td>".$send['titre']."</td>
            <td><button id=".$send['id']." class='btn btn-info more'>lire plus </button></td>
        ";
    }
    echo $out;


}else if(isset($_GET['articles'])){
    $id= $_GET['articles'];
// a query that allows us to get the all informations of the articles that user whant to read
    $send= mysqli_fetch_array(mysqli_query($conn, "SELECT a.id, titre, commentaire, date_pub, libelle as photo FROM
     photos as p INNER JOIN articles as a ON p.articles_id = a.id WHERE a.id='$id'"));

   
    $output ="
      <div class='card-header bg-success'>
        <p class='h2 text-dark'>".$send['titre']."</p>
      </div>

      <div class='card-body'><p>".$send['commentaire']."</p>
        <img src='../uploads/".$send['photo']."' width='200px' height='200px' class='rounded-circle'>
      </div>

      <div class='card-footer'>
        <button id=".$send['id']." class='btn btn-dark comment-btn fst-italic'>Commenter</button>
      </div>
      
      <div class='card-body form-comment' style='display:none'>
        <form id='users-comment'>
            <small class='text-muted'>Entrez le commentaire</small>
            <textarea name='comment' id='comment' cols='10' rows='5' class='form-control'></textarea>
            <input type='hidden' name='user_id' id='user_id' value=".$id_user.">
            <input type='hidden' name='id_article' id='id_article' value=".$send['id'].">
            <input type='submit' class='btn btn-primary' value='send'>
        </form>
      </div>


    ";

    echo $output;

}else if(isset($_POST['id_article'])){
  $id_article = $_POST['id_article'];
  $comment = $_POST['comment'];
  $user_id = $_POST['user_id'];

  $query = mysqli_query($conn, "INSERT INTO commentaire
            values(NULL, '$comment', NOW(),'$id_article','$user_id' )");

  if($query){
    $output ='<p class="alert alert-success">congratulations</p>';
  }else{
    $output ='<p class="alert alert-danger">failed</p>';
  }

  echo $output;
}else if(isset($_POST['article'])){
  $article = $_POST['article'];

  $query = mysqli_query($conn, "SELECT nom, photo,texte, c.date_pub 
              from commentaire as c inner join utilisateur as u 
                on c.utilisateur_id = u.id 
                  inner join articles as a 
                    on c.articles_id = a.id where a.id ='$article' ORDER BY c.date_pub DESC");
// query contient la jointure qui affiche tous les users qui ont commenté l'article et puis l'as fetché et displayer dans le output utilisant la class card et row
  while($row=mysqli_fetch_array($query)){
    $output .= "
      <div class='row m-2'>
          <div class='offset-lg-3 col-lg-6 offset-lg-3'>
          <div class='card bg-dark'>
              <div class='card-header text-info'>
              <p>".$row['nom']."</p>
              </div>

              <div class='card-body'>
                  <div class='row'>
                      <div class='offset-lg-2 col-lg-6 offset-lg-2'>
                      <div>
                      <img src='../uploads/".$row['photo']."' width='100px' height='100px' class='rounded-circle'></div>
                      </div>

                      <div class='col-lg-4'>
                          <p class='text-info'>".$row['texte']."</p>
                      </div>
                      </div>
                  </div>
              
              </div>
          </div> 
          </div>    
      </div>
    ";
  }

  echo $output;
}

