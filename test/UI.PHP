if ($bind) {
        $filter = "(sAmaccountName=$username)";
        $result = ldap_search($ldap_con,"dc=VALPROCESS,dc=com",$filter);
        ldap_sort($ldap_con, $result,"sn");
        $info = ldap_get_entries($ldap_con, $result);
            for ($i=0; $i<$info["count"]; $i++)
                {       

	               if($ino['count']>1)
	               break;
	               echo " ".$info[$i]["cn"][0] .", ". $info[$i]["description"][0] ."";
	               $userDn = $info[$i]["distinguishedname"][0];
                }
                    @ldap_close($ldap);
                } else {
	               $msg = "invalide mot de passe";
	               echo $msg;
                        }    