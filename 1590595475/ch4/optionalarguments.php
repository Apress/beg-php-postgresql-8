<?php

function salestax($price,$tax="") {
   $total = $price + ($price * $tax);
   echo "Total cost: $total";
}

salestax(42.00);

?>