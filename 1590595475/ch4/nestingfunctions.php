<?php

function salestax($price,$tax) {
   function convert_pound($dollars, $conversion=1.6) {
      return $dollars * $conversion;
   }
   $total = $price + ($price * $tax);  
   echo "Total cost in dollars: $total. Cost in British pounds: "
        .convert_pound($total);
}

salestax(15.00,.075);
echo convert_pound(15);

?>