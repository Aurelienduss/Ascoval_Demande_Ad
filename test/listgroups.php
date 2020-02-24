<?php
// $ds doit être une ressource de connexion valide

$ldap_svr = "ldap://ValProcess.lan";

$ds=ldap_connect($ldap_svr) or die("Cannot connect to LDAP server!");

ldap_set_option ($ds, LDAP_OPT_REFERRALS, 0);
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);

ldap_bind($ds,"VALPROCESS\aurelien.dussart","G105wacom");
ldap_control_paged_result($ds,1000);




$basedn = "ou=Groups,ou=SS,ou=Ascoval,dc=ValProcess ,dc=lan";
$justthese = array();
$filter="(&(objectclass=group)(&(cn=FSC*)))";
$sr = ldap_search($ds, $basedn, $filter, $justthese );

$info = ldap_get_entries($ds, $sr);

for ($i=0; $i < $info["count"]; $i++) {
   


if ($info[$i]["cn"][0] == $info[$i=$i+1]["cn"][0]) {
echo "valeur égale";

}

else {

	echo $info[$i]["cn"][0],"||||||";echo $info[$i=$i+1]["cn"][0];
	?><br> <?php
}









}






echo count($info);


?>