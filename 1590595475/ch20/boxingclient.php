<?php
   $client = new SoapClient("boxing.wsdl");
   echo $client->getQuote("Ali");
?>