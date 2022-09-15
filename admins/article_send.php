<?php
session_start();
include('../connect.php');
if (isset($_SESSION['nom']) && ($_SESSION['prenom']) && ($_SESSION['mdp'])) {
    
}else {
     "<script>
        setInterval(function(){
        window.location.replace('login.php');
        },1000)
        </script>";
}
    $nom=$_SESSION['nom'];
    $prenom=$_SESSION['prenom'];
    $mdp=$_SESSION['mdp'];
    $query= "SELECT id  FROM admin WHERE nom='$nom' AND prenom='$prenom' AND mdp='$mdp' " ;

    $resultat= mysqli_query($conn,$query);
    //print_r($resultat);
    // FETCH: c'est une methode qui permet de parcourir les listes des données 

    while ($row=mysqli_fetch_array($resultat)) {
         $id=$row['id'];
         
    }
    //echo $id;



  if(isset($_POST['titre'])){
   echo $titre=$_POST['titre'];
   echo $comment=$_POST['comment'];
   echo $categories=$_POST['categories'];
   echo $s_categories=$_POST['s_categories'];
   $token=rand(1000000,9999999);
   
   
    $send= "INSERT INTO articles (id,titre,commentaire,date_pub,admin_id,sous_categories_id,categories_id) VALUES
    ('$token','$titre','$comment',now(),'$id','$s_categories',$categories)";
    $test=mysqli_query($conn,$send);
    if($test){
        echo "success";
    }
  
   
   //taking the id of the last related articles

   $query4 = mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM articles WHERE titre='$titre' AND commentaire = '$comment'"));
   $id_activity = $query4['id'];
    
   

    $file_name=$_FILES['files']['name'];
    $file_tmp=$_FILES['files']['tmp_name'];
    $file_size=$_FILES['files']['size'];
    $file_error=$_FILES['files']['error'];
    $file_type=$_FILES['files']['type'];
	  
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

      $insert = mysqli_query($conn, "INSERT INTO photos(id,libelle,articles_id) VALUES (null,'$file_name',$id_activity)");	       

  }

?>