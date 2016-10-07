<?php
   /* Connect and bind to the LDAP server...*/

   $dn = "OU=People,OU=staff,DC=ad,DC=example,DC=com";
   $entry["displayName"] = "Julius Caesar";
   $entry["company"] = "Roman Empire";
   $entry["mail"] = "imperatore@example.com";
   ldap_add($ldapconn, $dn, $entry) or die("Could not add new entry!");
   ldap_unbind($ldapconn);
?>