<?php

   // Open an IMAP connection
   $user = "jason";
   $pswd = "mypswd";
   $ms = imap_open("{imap.example.com:143}INBOX",$user, $pswd);

   // How many messages in user jason's inbox?
   $msgnum = imap_num_msg($ms);
   echo "<p>User $user has $msgnum messages in his inbox.</p>";

?>