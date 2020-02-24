<?php
// $ds doit être une ressource de connexion valide

$ldap_svr = "ldap://ValProcess.lan";
$ds = ldap_connect($ldap_svr) or die("Cannot connect to LDAP server!");
ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_bind($ds,"VALPROCESS\aurelien.dussart","G106wacom");
$basedn= "ou=Groups,ou=SS,ou=Ascoval,dc=ValProcess ,dc=lan";
$justthese = array();
$db= mysqli_connect('localhost', 'root', '','admin');

///////////////////////////////////////////////////////////////////////////

$filtre_FSCTGG= "(&(objectclass=group)(&(cn=FSCTGG*)))";
$search_FSCTGG= ldap_search($ds, $basedn, $filtre_FSCTGG, $justthese);
$info_FSCTGG= ldap_get_entries($ds, $search_FSCTGG);
   for ($i = 0; $i < $info_FSCTGG["count"]; $i = $i + 1) { 
        $db->query ("INSERT INTO groups (Libelle, Nom, Groupe, Type, Real_Type) 
  			   		SELECT '".$info_FSCTGG[$i]["cn"][0]."','Nom','".$info_FSCTGG[$i]["description"][0]."','Commun','Global'
 			   Where not exists(select * from groups WHERE Libelle = '".$info_FSCTGG[$i]["cn"][0]."') ");

      	
    }
  
$filtre_FSCTLG= "(&(objectclass=group)(&(cn=FSCTLG*)))";
$search_FSCTLG= ldap_search($ds, $basedn, $filtre_FSCTLG, $justthese);
$info_FSCTLG= ldap_get_entries($ds, $search_FSCTLG);
        for ($i = 0; $i < $info_FSCTLG["count"]; $i = $i + 1) { 
        $db->query ("INSERT INTO groups (Libelle, Nom, Groupe, Type, Real_Type) 
  			   		SELECT '".$info_FSCTLG[$i]["cn"][0]."','Nom','".$info_FSCTLG[$i]["description"][0]."','Interservice','Domaine Local'
 			   Where not exists(select * from groups WHERE Libelle = '".$info_FSCTLG[$i]["cn"][0]."') ");
    }
  
$filtre_FSSSGG_C= "(&(objectclass=group)(&(cn=FSSSGG_C*)))";
$search_FSSSGG_C= ldap_search($ds, $basedn, $filtre_FSSSGG_C, $justthese);
$info_FSSSGG_C= ldap_get_entries($ds, $search_FSSSGG_C);
        for ($i = 0; $i < $info_FSSSGG_C["count"]; $i = $i + 1) { 
         $db->query ("INSERT INTO groups (Libelle, Nom, Groupe, Type, Real_Type) 
  			   		SELECT '".$info_FSSSGG_C[$i]["cn"][0]."','Nom','".$info_FSSSGG_C[$i]["description"][0]."','Commun','Global'
 			   Where not exists(select * from groups WHERE Libelle = '".$info_FSSSGG_C[$i]["cn"][0]."') ");
    }

$filtre_FSSSGG_S= "(&(objectclass=group)(&(cn=FSSSGG_S*)))";
$search_FSSSGG_S= ldap_search($ds, $basedn, $filtre_FSSSGG_S, $justthese);
$info_FSSSGG_S= ldap_get_entries($ds, $search_FSSSGG_S);
         for ($i = 0; $i < $info_FSSSGG_S["count"]; $i = $i + 1) { 
         $db->query ("INSERT INTO groups (Libelle, Nom, Groupe, Type, Real_Type) 
  			   		SELECT '".$info_FSSSGG_S[$i]["cn"][0]."','Nom','".$info_FSSSGG_S[$i]["description"][0]."','Service','Global'
 			   Where not exists(select * from groups WHERE Libelle = '".$info_FSSSGG_S[$i]["cn"][0]."') ");
    }

$filtre_FSSSLG_C= "(&(objectclass=group)(&(cn=FSSSLG_C*)))";
$search_FSSSLG_C= ldap_search($ds, $basedn,$filtre_FSSSLG_C, $justthese);
$info_FSSSLG_C= ldap_get_entries($ds, $search_FSSSLG_C);
        for ($i = 0; $i <$info_FSSSLG_C["count"]; $i = $i + 1) { 
         $db->query ("INSERT INTO groups (Libelle, Nom, Groupe, Type, Real_Type) 
  			   		SELECT '".$info_FSSSLG_C[$i]["cn"][0]."','Nom','".$info_FSSSLG_C[$i]["description"][0]."','Commun','Global'
 			   Where not exists(select * from groups WHERE Libelle = '".$info_FSSSLG_C[$i]["cn"][0]."') ");
    }
      
      $filtre_FSSSLG_S= "(&(objectclass=group)(&(cn=FSSSLG_S*)))";
$search_FSSSLG_S= ldap_search($ds, $basedn,$filtre_FSSSLG_S, $justthese);
$info_FSSSLG_S= ldap_get_entries($ds, $search_FSSSLG_S);
        for ($i = 0; $i < $info_FSSSLG_S["count"]; $i = $i + 1) { 
          $db->query ("INSERT INTO groups (Libelle, Nom, Groupe, Type, Real_Type) 
  			   		SELECT '".$info_FSSSLG_S[$i]["cn"][0]."','Nom','".$info_FSSSLG_S[$i]["description"][0]."','Service','Global'
 			   Where not exists(select * from groups WHERE Libelle = '".$info_FSSSLG_S[$i]["cn"][0]."') ");
    }


