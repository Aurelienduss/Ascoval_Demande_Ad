
<?php
	session_start();
/////////////////////////////////LDAP////////////////////////////
	$ldap_dn ="VALPROCESS\\".$_POST["username"];
	$username=$_POST["username"];
	$password=$_POST["password"];


		
	$ldap_con = ldap_connect("ldap://ValProcess.lan");
	ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
	/////////////////////////////////////////////////////////////
    //////////////////////Vérification login ldap///////////////////////
  	public function connexion {

  	if(!empty($username && $password))
  	{
  	  	if($username == "admin" && $password == "admin")
  	  	{
  			header('location:admin-requete.php');
  		}
		else
		{
		if(@ldap_bind($ldap_con,$ldap_dn,$username))
		{
        echo '<meta http-equiv="refresh" content="0;URL=menu.php">';
   		}
		else
		{
		echo '<body onLoad="alert(\'Login ou mot de passe incorect\')">';
        echo '<meta http-equiv="refresh" content="0;URL=../vue/loginView.html">';
		}
		}
	}

}
	
?>

