<?php

require_once("private/conf.php");

$conn=mysqli_connect("$host", "$user", "$pass", "$dbb");

// Contrôle sur la connexion
if (!$conn){ //Si la connexion n'a pas été effectué
    die ("Connection impossible");
}
else {
    echo "Connexion réussie";
}

$nom=$_POST['nom'];
$email=$_POST['email'];
$sujet= str_replace("'", "&rsquo;",$_POST['sujet']);
$message = str_replace("'", "&rsquo;", $_POST['message']);
$date = date("d-m-Y");
$heure = date("H:i");
$dateheure = "$date ($heure)"; 
$numero = rand(1, 1000000);

$req="INSERT INTO mail (id, name, email, subject, message, lire, autre, num) VALUES ('', '$nom', '$email', '$sujet', '$message', 'nl', '$dateheure', '$numero')";

$res = $conn->query($req);
// on se casse ou on veut
echo "<script type='text/javascript'>document.location.replace('index.html');</script>";

?>