
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

    if(@ldap_bind($ldap_con,$ldap_dn,$_POST["password"])) {

        echo '<meta http-equiv="refresh" content="0;URL=menuView.php">';
        }
    else{
        echo '<body onLoad="alert(\'Login ou mot de passe incorect\')">';
    echo '<meta http-equiv="refresh" content="0;URL=login.html">';
}}
else {
    echo '<body onLoad="alert(\'Login ou mot de passe incorect\')">';
    echo '<meta http-equiv="refresh" content="0;URL=login.html">';
}
//////////////////////////////////////////////////////////////////////////////






?>