<?php
   /* ... Connect to LDAP server and bind to a directory. */

   /* Search the directory  */
   $results = ldap_search($ldapconn, $dn, "sn=G*");

   /* Create array of attributes and corresponding entries. */
   $entries = ldap_get_entries($ldapconn,$results);                

   /* How many entries found? */
   $count = $entries["count"];

   /* Output the surname of each located user. */
   for($i=0;$i<$count;$i++) echo $entries[$i]["sn"][0]."<br />";

   /* Close the connection. */
   ldap_unbind($ldapconn);
?>