<?php
   require('nusoap/nusoap.php');

   $server = new soap_server();

   // Initiate WSDL configuration 
   $server->configureWSDL('boxing', 'urn:boxing');

   // Designate the WSDL namespace
   $server->wsdl->schemaTargetNamespace = 'urn:boxing';

   // Register the getRandQuote() function. 
   $server->register("getRandQuote",
                array('format' => 'xsd:string'),
                array('return' => 'xsd:string'),
                'urn:boxing',
                'urn:boxing#getRandQuote');

   function getRandQuote() {
      mysql_connect("localhost","webservicesuser","secret");
      mysql_select_db("wjgilmore");
      $query = "SELECT boxer, quote, year FROM quotation 
                ORDER BY RAND() LIMIT 1";
      $result = mysql_query($query);
      $row = mysql_fetch_array($result);
      $boxer = $row["boxer"];
      $quote = $row["quote"];
      $year = $row["year"];
      return "\"$quote\", $boxer ($year)";
   }

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>