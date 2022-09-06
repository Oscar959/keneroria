<?php
$conn=mysqli_connect("localhost","root","","kenerozia");
$conn->set_charset("utf-8");
// la variable qui va contenir la connexion à la base des données
if ($conn) {
    echo '<p class="text-danger shadow text-center">connection reussie</p>';
}
?>