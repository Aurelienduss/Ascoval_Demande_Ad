<?php
  session_start();
/////////////////////////////////LDAP////////////////////////////
  $ldap_dn ="VALPROCESS\\".$_POST["username"];
  $_SESSION["username"]=$_POST["username"];
  $_SESSION["password"]=$_POST["password"]; 
  $ldap_con = ldap_connect("ldap://ValProcess.lan");
  ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
  /////////////////////////////////////////////////////////////
    //////////////////////Vérification login ldap///////////////////////
    if(!empty($_POST["username"] && $_POST["password"])){
        
        if(@ldap_bind($ldap_con,$ldap_dn,$_POST["password"]))
        
        echo '<meta http-equiv="refresh" content="0;URL=menu.php">';
        else
     echo '<body onLoad="alert(\'Login ou mot de passe incorect\')">';
        echo '<meta http-equiv="refresh" content="0;URL=login.html">';
    }
  else {
     echo '<body onLoad="alert(\'Login ou mot de passe incorect\')">';
        echo '<meta http-equiv="refresh" content="0;URL=login.html">';
  } 
//////////////////////////////////////////////////////////////////////////////
  
      
    


  
?>
<!DOCTYPE html
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>



<div class="login-page">
  <div class="form" >
    
    <form class="login-form" action="login3.html" method='POST'>
      <input type="text" placeholder="username" name="username" / >
      <input type="password" placeholder="password" name="password"/>
      <button>Connexion</button>
   </a></p>
    </form>
  </div>
</div>

</body>
</html>