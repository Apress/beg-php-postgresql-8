CREATE OR REPLACE FUNCTION phpmail(text,text,text) RETURNS integer AS $$
   $to = $arg0;
   $subject = $arg1;
   $body = $arg2;
   if (mail($to, $subject, $body)) {
     return 1;
   }
   else {
     return 0;
   }
$$ LANGUAGE 'plphp';

