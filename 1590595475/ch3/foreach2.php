<?php

$links = array("The Official Apache Web site" => "www.apache.org", 
               "The Official MySQL Web site" => "www.mysql.com", 
                          "The Official PHP Web site" => "www.php.net");

echo "<b>Online Resources</b>:<br />";
foreach($links as $title => $link) {
    echo "<a href=\"http://$link\">$title</a><br />";
}

?>