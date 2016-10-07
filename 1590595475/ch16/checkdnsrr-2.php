<?php
   $email = "ceo@example.com";
   $domain = explode("@",$email);
   
   $valid = checkdnsrr($domain[1], "ANY");

   if($valid) echo "The domain has an MX record!";
   else echo "Cannot locate MX record for $domain[1]!";
?>