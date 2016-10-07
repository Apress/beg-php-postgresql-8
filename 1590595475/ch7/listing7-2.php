<?php

 // Create new corporatedrone object
   $drone1 = new corporatedrone();

   // Set the $drone1 employeeid member
   $drone1->setEmployeeID("12345");

   // Clone the $drone1 object
   $drone2 = clone $drone1;

   // Set the $drone2 employeeid member
   $drone2->setEmployeeID("67890");

   // Output the $drone1 and $drone2 employeeid members
   echo "drone1 employeeID: ".$drone1->getEmployeeID()."<br />";
   echo "drone2 employeeID: ".$drone2->getEmployeeID()."<br />";
   echo "drone2 tiecolor: ".$drone2->getTiecolor()."<br />";


?>