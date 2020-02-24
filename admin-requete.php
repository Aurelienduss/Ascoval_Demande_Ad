<?php
session_start();


$db = mysqli_connect('localhost','root','pascal59264','admin');
$exec_select_all = $db->query("SELECT * FROM demande"); 

?>

<!DOCTYPE html
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">
</head>
<body>
 <header>
    <nav class="nav">
      <div class="container">
      <div class="menu" id="open-navbar1">
        <ul class="list">
         <li><a href="menu.php">Consultation</a></li>
         <li><a href="consultation-requete.php">Demande</a></li>
          <li><a href="deco.php">Deconnexion</a></li>
          <li><img class="pic-asco"src="image/ascoval.png" style="height:40px; float: left; margin-left:500px; margin-top:10px;"></img></li>
        </ul>
      </div>
    </nav>
  </header>




    

<div class="ouii">
    <table class="table-fill">
<thead>
<tr>
<th class="text-left">Nom demandeur</th>
<th class="text-left">Fichier Demandé</th>
<th class="text-left">Date</th>
<th class="text-left">Etat</th>
<th class="text-left">?</th>
<th class="text-left">?</th>
</tr>
</thead>

<form  action="traitement-requete.php" method='POST'>
   <?php while  ($row = $exec_select_all->
            fetch_array()) {?>
          

            <tr>
      <td><?php echo $row["login_demandeur"] ?></td>
      <td><?php echo $row["fichier_demandeur"] ?>
      <td><?php echo $row["date"] ?></td>
      <td>En <?php echo $row["statut"] ?></td>
      <td><button value="Accepté">Accepté</button></td>
      <td><button value="Refusé">Refusé</button></td>

            </tr>


            <?php
            }
          ?>

           





</table>
</div>
</form>
</body>
</html>