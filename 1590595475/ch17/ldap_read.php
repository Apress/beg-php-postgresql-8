<?php
   /* Connect and bind to the LDAP server.... */
   $dn = "CN=Jason Gilmore, OU=People, OU=staff, 
          DC=ad, DC=example, DC=com";
   $results = ldap_read($ldapconn, $dn, 
                        '(objectclass=person)', array("givenName", "sn"));
   $entry = ldap_get_entries($ldapconn, $sr);
   echo "First name: ".$entry[0]["givenname"][0]."<br />";
   echo "Last name: ".$entry[0]["sn"][0]."<br />";
   ldap_unbind($ldapconn);
?>