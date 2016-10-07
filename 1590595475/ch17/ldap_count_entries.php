   $results = ldap_search($ldapconn, $dn, "sn=G*");
   $count = ldap_count_entries($ldapconn, $results);
   echo "<p>Total entries retrieved: $count</p>";