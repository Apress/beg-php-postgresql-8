CREATE OR REPLACE FUNCTION hal2000(text) RETURNS text AS $$
DECLARE
   someuser     ALIAS FOR $1;
   greeting     TEXT;
   ampm         INTEGER;
BEGIN
   SELECT to_char(now(),'HH24') INTO ampm;
   IF ampm < 12 THEN
      greeting := 'Good Morning ';
   ELSE
      greeting := 'Good Evening ';
   END IF;
   greeting := greeting || someuser;
   RETURN greeting;
END;
$$ LANGUAGE 'plpgsql';


