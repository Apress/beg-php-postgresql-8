<?php
   $ldapHost = "ldap://ad.example.com";
   $ldapPort = "389";
   $ldapUser = "ldapreadonly";
   $ldapPswd = "iloveldap";

   $ldapconn = ldap_connect($ldapHost, $ldapPort) 
               or die("Can't establish LDAP connection");

   ldap_bind($ldapconn, $ldapUser, $ldapPswd) 
             or die("Can't bind to the server.");
?>