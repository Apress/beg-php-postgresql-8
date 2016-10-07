CREATE OR REPLACE FUNCTION firstfunc () RETURNS text AS
$$ SELECT 'hello world'::text;
$$ LANGUAGE 'sql' IMMUTABLE;


CREATE OR REPLACE FUNCTION newemployee(integer,text,text,integer)
RETURNS boolean AS $$
   INSERT INTO employee (employee_id,fname,lname)
      VALUES ($1,$2,$3);
   INSERT INTO salary (employee_id, salary)
      VALUES ($1,$4);
   SELECT TRUE;
$$ LANGUAGE 'sql' RETURNS NULL ON NULL INPUT;



