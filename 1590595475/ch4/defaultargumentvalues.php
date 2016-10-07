<?php

function salestax($price,$tax=.0575) {
   $total = $price + ($price * $tax);
   echo "Total cost: $total";
}

$price = 15.47;
salestax($price);

?>