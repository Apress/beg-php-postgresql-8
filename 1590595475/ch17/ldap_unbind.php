<?php
   $ldapUser = "ldapreadonly";
   $ldapPswd = "iloveldap";
   $ldapconn = ldap_connect("ldap://ad.example.com", 389) 
               or die("Can't establish LDAP connection");
   ldap_bind($ldapconn,"ldapreadonly", "iloveldap") 
               or die("Can't bind to LDAP.");

   /* Execute various LDAP-related commands. */
   ldap_unbind($ldapconn) 
               or die("Could not unbind from LDAP server.");
?>