<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
input[type=button], input[type=submit], input[type=reset], button, .button {
	padding: 2px 15px;
	margin: 3px 4px;
	display: inline-block;
	color: #ffffff;
	font-size: 16px;
	cursor: pointer;
	background: #362F2F;
	background: linear-gradient(top, #362F2F 0%, #1d1616 100%);
	background: -moz-linear-gradient(top, #362F2F 0%, #1d1616 100%);
	background: -webkit-linear-gradient(top, #362F2F 0%, #1d1616 100%);
	background: -o-linear-gradient(top, #362F2F 0%, #1d1616 100%);
	border: 1px solid #FFFFFF;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-o-border-radius: 5px;
	box-shadow:0px 0px 2px 1px rgba(0, 0, 0, 0.25), inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
	-moz-box-shadow:0px 0px 2px 1px rgba(0, 0, 0, 0.25), inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
	-webkit-box-shadow:0px 0px 2px 1px rgba(0, 0, 0, 0.25), inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
	-o-box-shadow:0px 0px 2px 1px rgba(0, 0, 0, 0.25), inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
}
input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover, button:hover, .button:hover {
	background: linear-gradient(top, #504949 0%, #362F2F 100%);
	background: -moz-linear-gradient(top, #504949 0%, #362F2F 100%);
	background: -webkit-linear-gradient(top, #504949 0%, #362F2F 100%);
	background: -o-linear-gradient(top, #504949 0%, #362F2F 100%);
}
input[type=button]:active, input[type=submit]:active, input[type=reset]:active, button:active, .button:active{
	opacity:0.8;
}

header.page-header {
   background-color: #000000;
    display: flex;
    height: 100px;
    min-width: 100px;
    align-items: center;
    color: #F7C027;
    text-shadow: #000 0 0 .2em;
}

header.page-header > h1 {
    font: bold 24px 'Arial Black', cursive,
        fantasy;
   
	margin-left:10px; 
}

header.page-header > img {
  
	margin-left:30px; 
}

 #cellule
   {
    color : #bfd3eb;
    text-align:center;
	background-color: #00ffff;
   }
   
    #cellule1
   {
    color : #bfd3eb;
    text-align:center;
	background-color: #0000ff;
   }
   
th {
background-color: #362F2F;
  color : #ffffff;
 padding:5px; 
}

tr:nth-child(even) {
	background-color: #CED4E5;
}

tr:nth-child(odd) {
	background-color: #E8EBF5;
}

.coul1{
font-style: bold;
}

table {
 font: 16px 'Arial';
border:3px solid #F6C125;
border-collapse:collapse;
width:90%;
margin:auto;
}

.affmess{
font: 16px 'Arial';
width:88%;
margin:auto;
 border: 2px solid #F6C125;
  box-shadow: 8px 8px 5px #444;
  padding: 5px 5px;
 
  margin-top:10px;
  background-image: linear-gradient(180deg, #fff, #ddd 40%, #ccc);
}

.dbout{
width:88%;
margin:auto;
 
text-align:center;
padding-top:25px; 
}

p{

}

td {
   border:1px solid #F6C125;
	padding:5px;
}

thead,
tfoot {
   background-color:#ff0000;
    color: #000000;
}

form {display: inline;
}

.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #000000;
color: #F7C027;  
   font: 12px 'Arial';
  text-align: center;
   
}
</style>
</head>
<?php
echo "<header class='page-header'>
<img src='images/logo.png'>
    <h1>Messagerie lire message !</h1>
</header>";

$id=$_POST['prodId'];



$date=$_POST['date'];



$nom=$_POST['nom'];

$email=$_POST['email'];

$sujet=$_POST['sujet'];

$message=$_POST['message'];

$lir=$_POST['lir'];

require_once("private/conf.php");

$db = mysqli_connect($host, $user, $pass,$dbb);

$req = "UPDATE mail SET lire='lu' WHERE num='$id'";

if ($db->query($req) === TRUE) {
 echo "<br>";
} else {
  echo "Error updating record: " . $db->error;
}

// On créé la requête
$req = "SELECT * FROM mail WHERE num='$id'";
// on envoie la requête
$res = $db->query($req);
 
// on va scanner tous les tuples un par un
echo "<table>";

echo"

   <tr>
      <th style='text-align:left'>Nom :</th>
      <th style='text-align:left'>Email :</th>
      <th style='text-align:center'>Date :</th>
     </tr>
  

";

while ($data = mysqli_fetch_array($res)) {
    // on affiche les résultats
	
    echo "<tr><td>".$data['name']."</td><td>".$data['email']."</td> <td style='text-align:center'>".$data['autre']."</td></tr>";
	
	echo "<tr><th colspan='3' style='text-align:left'> Objet :</th></tr>";

	echo "<tr><td colspan='3'>".$data['subject']."</td></tr>";
	echo "<tr><th colspan='3' style='text-align:left'> Message :</th></tr>";
	
$message = str_replace("\r\n", "<br>", $data['message']);	 
}
echo "</table>";

echo "<div class='affmess'><p>$message</p></div>";
echo "<div class='dbout'>";
echo'<FORM Method="POST" Action="supp.php">';
echo '<input id="prodId" name="prodId" type="hidden" value='.$id.'>'; 	
	echo '<input type="submit" value="Supprimer le message">'; 
 echo " </form>";

?>
<form>
<a href="index.php">
    <input type="button" id="envoyer" name="envoyer" value="Boite de reception">
	</a>
<form>
</div>
<br><br><br><br>
<div class='footer'>
  <p>&copy; 2021 VEVER 22</p>
</div>
</html>