<?php

function salestax($price,$tax) {
    $total = $price + ($price * $tax);  
    echo "Total cost: $total";
}

    $pricetag = 15.00;
    $salestax = .075;
    salestax($pricetag, $salestax);

?>