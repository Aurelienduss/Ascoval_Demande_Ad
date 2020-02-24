<?php
  session_start();

 ///////////////////////////////////////////////
/*  $user = $_SESSION["username"];
  if ($user = $_SESSION["username"]){
    echo "bienvenu";
  }

  else {

  }*/
   
    if(!empty($_SESSION["username"]))
    {
 
    }
    else
    {
         header('location:login.html'); 
    }

  $db = mysqli_connect('localhost','root','pascal59264','admin');
  $req_select_nom ='SELECT Nom FROM fichier';
  $exec_select_nom = $db->query('SELECT * FROM fichier'); ?>
<!DOCTYPE html
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <meta charset="UTF-8">
</head>
<body>


 
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
    </div>
   </nav>
 
<div class="login-page2"><a>Demande Droit Fichier</a></div>
<div class="login-page">
  <div class="form" >

    <form class="login-form" action="requete.php" method='POST'>
       <input type="text" name="pour_qui" placeholder="prenom.nom"></input>
      <select class="dropdown" name="Nom">
        <?php while (NULL !== ($row = $exec_select_nom->fetch_array())) 
          {?> 
           <option value=<?php echo $row['Nom']; ?>><?php echo $row['Nom']; ?> </option>
          <?php
          }
          ?>
      </select><br><br>
        <input type="checkbox" name="ecriture" value="ecriture">Ecriture </input><br><br>
      <button>Validé</button>
    </form>
  </div>
</div>

</body>
</html>