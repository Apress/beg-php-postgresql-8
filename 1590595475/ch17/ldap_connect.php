<?php
   $ldapHost = "ldap://ad.example.com";
   $ldapPort = "389";
   $ldapconn = ldap_connect($ldapHost, $ldapPort) 
               or die("Can't establish LDAP connection");
?>