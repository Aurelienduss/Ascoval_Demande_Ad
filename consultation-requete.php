<?php
session_start();
$username = $_SESSION["username"];
$db = mysqli_connect('localhost','root','pascal59264','admin');
$exec_select_all = $db->query("SELECT * FROM demande where  login_demandeur='" .$username."'"); 

    if(!empty($_SESSION["username"]))
    {
  
    }
    else
    {
         header('location:login.html'); 
    }
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
         <li><a href="consultation-requete.php">Consultation</a></li>
         <li><a href="menu.php">Demande</a></li>
          <li><a href="deco.php">Deconnexion</a></li>
            <li><img class="pic-asco"src="image/ascoval.png" style="height:40px; float: left; margin-left:500px; margin-top:10px;"></img></li>
        </ul>
      </div>
    </nav>
  </header>


 <table class="table-fill">
  <thead>
    <tr>
      <th class="text-left">Fichier Demandé</th>
      <th class="text-left">Pour qui</th>
      <th class="text-left">Date</th>
      <th class="text-left">Etat</th>
      </tr>
  </thead>
  <?php while  ($row = $exec_select_all->fetch_array()) 
    {?>
      <tr>
        <td><?php echo $row["fichier_demandeur"] ?></td>
         <td><?php echo $row["pour_qui"] ?></td>
        <td><?php echo $row["date"] ?></td>
        <td>En <?php echo $row["statut"] ?></td>
      </tr>
    <?php } ?>
  </table>

</body>
</html>