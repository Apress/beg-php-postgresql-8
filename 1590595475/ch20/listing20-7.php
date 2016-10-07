<?php

   require("nusoap/nusoap.php");

   // Insert your Google API key
   $key = 'INSERT YOUR KEY HERE';
    
   // Point to the WSDL file
   $wsdl = "googleapi/GoogleSearch.wsdl";

   // Create a new soapclient object
   $client = new soapclient($wsdl, 'wsdl');

   // Create a proxy so can call the Google methods directly
   $proxy = $client->getProxy();

   // Suppose user enters keyword via Web form (would be via $_POST)
   $keyword = "freplace";

   // Pass keyword to doSpellingSuggestion() method.
   $suggestion = $proxy->doSpellingSuggestion($key, $keyword);

   // Prompt user to consider searching using suggested term
   echo "Supplied search term not found. Perhaps you 
         meant <a href=''>$suggestion</a>?";

?>