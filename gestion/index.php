<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
<style type="text/css">
input[type=button], input[type=submit], input[type=reset], button, .button {
	padding: 2px 15px;
	margin: 3px 4px;
	display: inline-block;
	color: #ffffff;
	font-size: 14px;
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

p {
    font: 12px 'Arial';
      color: #F7C027;  
		}
#ouvert
   {
    color : #bfd3eb;
    text-align:center;
	background-color: #86FC84;
	background: url("images/ouvert.png") no-repeat;
	background-position: center;
}
  
   
    #fermee
   {
    color : #bfd3eb;
    text-align:center;
	background-color: #FCED84;
	background: url("images/ferme.png") no-repeat;
	background-position: center;
   }

 #cellule
   {
    color : #bfd3eb;
    text-align:center;
	background-color: #86FC84;
   }
   
    #cellule1
   {
    color : #bfd3eb;
    text-align:center;
	background-color: #FCED84;
   }
   
   #tete
   {
   border:3px solid #F6C125;
    color : #ffffff;
    text-align:center;
	background-color: #000000;
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


td {
   border:1px solid #F6C125;
	padding:5px;
}

thead,
tfoot {
   background-color:#ff0000;
    color: #000000;
}



.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #000000;
  color: white;
  text-align: center;
   
}
</style>


	</head>

<?php



echo "<header class='page-header'>
<img src='images/logo.png'>
    <h1>Messagerie boite de r&eacute;ception !</h1>
</header>";

$date = date("d-m-Y");
$heure = date("H:i");
$dateheure = "$date ($heure)"; 


require_once("private/conf.php");

// on se connecte à MySQL et on sélectionne la base
$conn = mysqli_connect("$host", "$user", "$pass", "$dbb");



// Contrôle sur la connexion
if (!$conn){ //Si la connexion n'a pas été effectué
    die ("Connection impossible");
}
else {
   echo "<br>";
}


// On créé la requête
$req = "SELECT * FROM `mail` ORDER BY `mail`.`autre` DESC"; 
// on envoie la requête
$res = $conn->query($req);

// Nbre de ligne de résultat
$result=mysqli_query($conn,$req);
 $nbreResult=mysqli_num_rows($result);
 $mess = "messages dans la boite";
if ($nbreResult == '0'){
$mess = "Aucun message dans la boite";
$nbreResult = '';
}
if ($nbreResult == '1'){
$mess = "message dans la boite";
}
mysqli_free_result($result);

echo"<table>

 <tr>
      <th colspan='5' id='tete' style='text-align:left'>Nous sommes le $date [$nbreResult $mess]</th>
    
   </tr>

   <tr>
      <th style='text-align:left'>Objet :</th>
      <th style='text-align:left'>De :</th>
      <th>Date :</th>
      <th>Vue :</th>
	   <th>Afficher :</th>
   </tr>";
// on va scanner tous les tuples un par un
   while ($ligne = mysqli_fetch_array($res)) {
  

echo"
   <tr>
      <td>".$ligne['subject']."</td>
      <td>".$ligne['name']."</td>
      <td style='text-align:center'>".$ligne['autre']."</td>
	 "; 
	 
	$name= $ligne['name'];  
	$email= $ligne['email'];  
	$sujet= $ligne['subject'];  
	$message= $ligne['message'];  
	$lir= $ligne['lire']; 
	$date= $ligne['autre'];  
	$num= $ligne['num'];  
	
	
	if ($lir != 'nl'): 
    echo"  <td id='ouvert'>   </td>";
	else:  
	  echo" <td id='fermee'>   </td>";
	 endif ; 
	   
	
echo'<FORM Method="POST" Action="page.php">';


echo '<input id="nom" name="nom" type="hidden" value='.$name.'>'; 	
echo '<input id="email" name="email" type="hidden" value='.$email.'>'; 	
echo '<input id="sujet" name="sujet" type="hidden" value='.$sujet.'>'; 	
echo '<input id="message" name="message" type="hidden" value='.$message.'>'; 	
echo '<input id="lir" name="lir" type="hidden" value='.$lir.'>'; 	
echo '<input id="date" name="date" type="hidden" value='.$date.'>'; 	


echo '<input id="prodId" name="prodId" type="hidden" value='.$num.'>'; 	
	
	
	
	echo '<td style="text-align:center"><input type="submit" value="Lire le message"> </a></td>'; 
	
  echo " </tr>
  
";

 echo " </form>
  
";


}	
	
	
echo "</table><br><br><br><br>";

echo "<div class='footer'>
  <p>&copy; 2021 VEVER 22</p>
</div>";

mysqli_close($conn);
////////////////////////////////////////////////////////
?>
</html>
