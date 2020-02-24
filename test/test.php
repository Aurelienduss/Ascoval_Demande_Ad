<?php

	$ldap_dn = "uid="."ValProcess/"+$_POST["username"].",dc=example,dc=com";
	$ldap_password = $_POST["passwordd"] ;

	$ldapconn = ldap_connect("ldap://ValProcess.lan");
	ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);


if ($ldapconn) {

    // Connexion au serveur LDAP
    $ldapbind = ldap_bind($ldapconn, $ldap_dn, $ldap_password);

    // Vérification de l'authentification
    if ($ldapbind) {
      
        echo $ldap_dn;
    } else {

        echo $ldap_dn;
    }

}


	
?> 