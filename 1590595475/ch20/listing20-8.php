<?php
   require('nusoap/nusoap.php');

   // Function: getRandQuote()
   // Inputs: None
   // Outputs: A string containing information about a quote, 
   //  its attribution, and date.
   function getRandQuote() {
     // Connect to the MySQL DB server and select the database
      mysql_connect("localhost","webserviceuser","secret");
      mysql_select_db("chapter20");

      // Create and execute the query
      $query = "SELECT boxer, quote, year FROM quotation 
                      ORDER BY RAND() LIMIT 1";
      $result = mysql_query($query);
      $row = mysql_fetch_array($result); 

      // Retrieve, assemble, and return the quote data
      $boxer = $row["boxer"];
      $quote = $row["quote"];
      $year = $row["year"];
      return "\"$quote\", $boxer ($year)";
   }

   // Instantiate a new soap server object
   $server = new soap_server;

   // Register the getRandQuote() method
   $server->register("getRandQuote");

   // Automatically execute any incoming request 
   $server->service($HTTP_RAW_POST_DATA);
?>