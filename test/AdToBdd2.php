<?php
// $ds doit être une ressource de connexion valide

$ldap_svr = "ldap://ValProcess.lan";
$ds=ldap_connect($ldap_svr) or die("Cannot connect to LDAP server!");
ldap_set_option ($ds, LDAP_OPT_REFERRALS, 0);
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_bind($ds,"VALPROCESS\aurelien.dussart","G106wacom");
$basedn = "ou=Groups,ou=SS,ou=Ascoval,dc=ValProcess ,dc=lan";
$justthese = array();
$db = mysqli_connect('localhost','root','pascal59264','admin');





///////////////////////////////////////////////////////////////////////////
$filtre_FSCTGG="(&(objectclass=group)(&(cn=FSCTGG*)))";
$search_FSCTGG = ldap_search($ds, $basedn, $filtre_FSCTGG, $justthese );
$info_FSCTGG = ldap_get_entries($ds, $search_FSCTGG);

foreach ($info_FSCTGG["Nom"] as $key => $value) {
    // $arr[3] sera mis à jour avec chaque valeur de $arr...
    echo "{$key} => {$value} ";
    print_r($arr);
}

	////////////////////////////////////////////////////////////////////////

$filtre_FSCTLG = "(&(objectclass=group)(&(cn=FSCTLG*)))";
$search_FSCTLG = ldap_search($ds, $basedn, $filtre_FSCTLG, $justthese );
$info_FSCTLG = ldap_get_entries($ds, $search_FSCTLG);


for ($i=0; $i < $info_FSCTLG["count"]; $i++) {  
	if ($info_FSCTLG[$i]["cn"][0] == $info_FSCTLG[$i=$i+1]["cn"][0]) 
	{
		echo "Même nom";}
	else 
	{
		/*$req_insert_FSCTLG = 
		"INSERT INTO groups (Libelle, Nom, Type, Real_Type, Groupe) SELECT ('".$info_FSCTLG[$i]["cn"][0]."','Nom','Commun','Global','groupe')";

		$db->query($req_insert_FSCTLG);
		$req_insert_FSCTLG2 = 
		"INSERT INTO  groups (Libelle, Nom, Type, Real_Type, Groupe) VALUES ('".$info_FSCTLG[$i=$i+1]["cn"][0]."','Nom','Commun','Domaine Local','groupe')";
		$db->query($req_insert_FSCTLG2);*/
		echo $info_FSCTGG[$i]["cn"][0];?> <br>  <?php echo $info_FSCTGG[$i=$i+1]["cn"][0];
		?><br><?php
	}
	}
								









echo count($info);
?>