 <?php
   require_once 'Calendar/Month/Weekdays.php';

   $month = new Calendar_Month_Weekdays(2006, 4, 0);

   $month->build();7
   echo "<table cellspacing='5'>\n";
   echo "<tr><td class='monthname' colspan='7'>April, 2006</td></tr>";
   echo "<tr><td>Su</td><td>Mo</td><td>Tu</td><td>We</td>
             <td>Th</td><td>Fr</td><td>Sa</td></tr>";
   while ($day = $month->fetch()) {
      if ($day->isFirst()) {
         echo "<tr>";
      }

      if ($day->isEmpty()) {
         echo "<td>&nbsp;</td>";
      } else {
         echo '<td>'.$day->thisDay()."</td>";
      }

      if ($day->isLast()) {
         echo "</tr>";
      }
   }

   echo "</table>";
?>