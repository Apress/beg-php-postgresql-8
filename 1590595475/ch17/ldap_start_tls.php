<?php
   $ldapconn = ldap_connect("ldap://ad.example.com");
   ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
   ldap_start_tls($ldapconn);
?>