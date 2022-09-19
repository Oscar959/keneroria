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

    $output = "";
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
            <input type='hidden' name='user_name' id='name' value=".$_SESSION['nom'].">
            <input type='hidden' name='id_article' id='id_article' value=".$send['id'].">
            <input type='submit' class='btn btn-primary' value='send'>
        </form>
      </div>


    ";

    echo $output;

}