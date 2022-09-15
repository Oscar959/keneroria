<?php
include('../connect.php');
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
    $send= mysqli_fetch_array(mysqli_query($conn, "SELECT titre, commentaire, date_pub, libelle as photo FROM
     photos as p INNER JOIN articles as a ON p.articles_id = a.id WHERE a.id='$id'"));

    $output = "";
    $output ="
      <div class='card-header bg-success'><p class='h2 text-dark'>".$send['titre']."</p></div>
      <div class='card-body'><p>".$send['commentaire']."</p>
       <img src='../uploads/".$send['photo']."' width='200px' height='200px' class='rounded-circle'>
      </div>

    ";

    echo $output;

}