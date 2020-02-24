<?php
session_start();
echo $_SESSION["username"];
/*var_dump($_POST['Nom']);
var_dump($_POST['lecture']);var_dump($_POST['ecriture']);*/

if (empty($_POST['ecriture']))
	$_POST["ecriture"] = "null";






//if(!empty($_POST['Nom'])) {
  //  foreach($_POST['Nom'] as $check) {
      //      echo $check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
  //  }
//}


 $db = mysqli_connect('localhost','root','','admin');



$req_insert_demande = "INSERT INTO demande (login_demandeur, fichier_demander,ecriture,pour_qui,type) 
    VALUES ('".$_SESSION["username"]."','".$_POST["groupe"]."','".$_POST["ecriture"]."','".$_POST["pour_qui"]."','".$_POST["service"]."')";


if ($db->query($req_insert_demande)) {
 /* echo '<meta http-equiv="refresh" content="0;URL=consultation-requete.php">';*/
	echo '<body onLoad="alert(\'Demande envoyez avec succès\')">';
}

else {
		 echo '<body onLoad="alert(\'Une erreur est survenue veuillez réessayer\')">';
    /*    echo '<meta http-equiv="refresh" content="0;URL=login.html">';*/
	}	
?> 