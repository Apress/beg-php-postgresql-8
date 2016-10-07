
CREATE OR REPLACE FUNCTION last_updated() RETURNS trigger AS
$$
BEGIN
    NEW.last_updated = now();
    RETURN NEW;
END
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER last_updated
BEFORE insert OR update
ON employee
FOR EACH row
EXECUTE PROCEDURE last_updated();

CREATE TABLE email (
   employee_id INTEGER PRIMARY KEY REFERENCES employee(employee_id),
   address TEXT
);

INSERT INTO email (employee_id, address)
   VALUES (3,'EmiliaJ@example.com');

CREATE OR REPLACE FUNCTION email_address_change() RETURNS TRIGGER AS
$$
DECLARE
   lastinitial TEXT;
   domain       TEXT := '@example.com';
   fulladdress TEXT;
BEGIN
   IF TG_OP = 'UPDATE' THEN
      IF NEW.fname <> OLD.fname OR NEW.lname <> OLD.lname THEN
          SELECT substr(NEW.lname,1,1) INTO lastinitial;
          fulladdress := NEW.fname || lastinitial || domain;
          UPDATE email SET address = fulladdress
             WHERE employee_id = NEW.employee_id;
      END IF;
   END IF;
   RETURN NEW;
END;
$$ LANGUAGE 'plpgsql';

CREATE TRIGGER maintain_email
AFTER update OR insert
ON employee
FOR EACH row
 EXECUTE PROCEDURE email_address_change();

