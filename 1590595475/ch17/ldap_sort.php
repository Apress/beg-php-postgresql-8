<?php
   /* Connect and bind */
   $results = ldap_search($ldapconn, $dn, "sn=G*", array("givenname", "sn"));

   ldap_sort($ldapconn, $results, "givenName");

   $entries = ldap_get_entries($ldapconn,$results);

   $count = $entries["count"];

   for($i=0;$i<$count;$i++) {
      echo $entries[$i]["givenname"][0]." ".$entries[$i]["sn"][0]."<br />";
   }

   ldap_unbind($ldapconn);
?>