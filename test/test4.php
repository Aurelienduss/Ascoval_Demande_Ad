<?php
$ldap_dn = "ou=Ascoval,dc=ValProcess,dc=lan";
$ldap_svr = "ldap://ValProcess.lan";

$conn=ldap_connect($ldap_svr) or die("Cannot connect to LDAP server!");

ldap_set_option ($conn, LDAP_OPT_REFERRALS, 0);
ldap_set_option ($conn, LDAP_OPT_PROTOCOL_VERSION, 3);

ldap_bind($conn,"VALPROCESS\aurelien.dussart","G105wacom");


$filter ="ou=*)";
$justthese = array('ou');

$result=ldap_list($conn, $ldap_dn, $filter, $justthese) or die("No search data found."); 

$info = ldap_get_entries($conn, $result);

for ($i=0; $i < $info["count"]; $i++) {
    echo $info[$i]["ou"][0] . '<br />';
}
?>