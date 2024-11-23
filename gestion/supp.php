<?php

$id=$_POST['prodId'];
echo $id;


require_once("private/conf.php");


$db = mysqli_connect($host, $user, $pass,$dbb);

 $req = "DELETE FROM mail WHERE num='$id'";
// on envoie la requête
$res = $db->query($req);
 
// on retourne a la page index
echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

?>
