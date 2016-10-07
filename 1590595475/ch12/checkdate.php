<?php

echo checkdate(4, 31, 2005);
// returns false

echo checkdate(03, 29, 2004);
// returns true, because 2004 was a leap year

echo checkdate(03, 29, 2005);
// returns false, because 2005 is not a leap year

?>