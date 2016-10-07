<?php

   require("nusoap/nusoap.php");

   // Insert your Google API key
   $key = 'INSERT YOUR KEY HERE';

   // Point to a WSDL file
   $wsdl = "googleapi/GoogleSearch.wsdl";

   // Create a new soapclient object
   $client = new soapclient($wsdl, 'wsdl');

   // Suppose user enters keyword via Web form (would be via $_POST)
   $keyword = "freplace";

   // Which parameters should be passed to the doSpellingSuggestion method?
   $input = array('phrase' => $keyword, 'key' => $key);

   // Call the doSpellingSuggestion method
   $suggestion = $client->call('doSpellingSuggestion', $input);

   // Prompt user to consider searching using suggested term
   echo "Supplied search term not found. Perhaps you meant 
         <a href=''>$suggestion</a>?";

?>