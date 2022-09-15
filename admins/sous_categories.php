<?php
include('../connect.php');
if(isset($_POST['data'])){
    $id= $_POST['data'];
    $r = mysqli_query($conn, "SELECT * from sous_categories where categories_id='$id'");
    $out= "";
    while($row= mysqli_fetch_array($r)){
        $out .="
        <option value=".$row['id']." class='form-control'>".$row['libelle']."</option>
        ";

    }
    echo $out;

}