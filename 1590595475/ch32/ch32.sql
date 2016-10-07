CREATE TABLE employee (
   employee_id INTEGER PRIMARY KEY,
   fname TEXT NOT NULL,
   lname TEXT NOT NULL
);
CREATE TABLE phone (
   employee_id INTEGER REFERENCES employee (employee_id) ON DELETE CASCADE,
   npa INTEGER NOT NULL,
   nxx INTEGER NOT NULL,
   xxxx INTEGER NOT NULL);

CREATE VIEW directory AS (SELECT employee.employee_id,
fname || ' ' || lname AS name,
npa || '-' || nxx || '-' || xxxx AS number
FROM employee JOIN phone USING (employee_id));

INSERT INTO employee(employee_id,fname,lname) VALUES (1,'Amber','Lee');
INSERT INTO phone(employee_id, npa, nxx, xxxx) VALUES (1,607,555,5210);
INSERT INTO employee(employee_id, fname, lname) VALUES (2,'Dylan','Jairus');
INSERT INTO phone(employee_id, npa, nxx, xxxx) VALUES (2,813,555,5040);
 
CREATE RULE directory_addition AS ON INSERT TO directory DO INSTEAD
(
       INSERT INTO employee VALUES
                (NEW.employee_id,
                 split_part(NEW.name,' ', 1),
                 split_part(NEW.name,' ', 2) );
        INSERT INTO phone VALUES
                (NEW.employee_id,
                 split_part(NEW.number,'-', 1)::INTEGER,
                 split_part(NEW.number,'-', 2)::INTEGER,
                 split_part(NEW.number,'-', 3)::INTEGER );
);

INSERT INTO directory VALUES (3,'Emma Jane','352-555-6120');

CREATE RULE youre_fired AS ON DELETE TO directory DO INSTEAD
DELETE FROM employee WHERE fname=split_part(OLD.name,' ', 1) AND
  lname=split_part(OLD.name,' ', 2);

CREATE RULE modify_employee AS
        ON UPDATE TO directory DO INSTEAD
        UPDATE phone SET
                      npa=split_part(NEW.number,'-', 1)::INTEGER,
                      nxx=split_part(NEW.number,'-', 2)::INTEGER,
                      xxxx=split_part(NEW.number,'-', 3)::INTEGER
                                WHERE employee_id = NEW.employee_id;


CREATE TABLE salary (employee_id INTEGER REFERENCES
  employee(employee_id) ON DELETE CASCADE, salary INTEGER);
INSERT INTO salary VALUES (2,400000);
INSERT INTO salary VALUES (3,200000);

CREATE RULE always_pay AS ON DELETE TO salary DO INSTEAD NOTHING;


CREATE TABLE salary_log (employee_id INTEGER REFERENCES
  employee(employee_id) ON DELETE CASCADE, salary_change INTEGER,
  changed_by TEXT, log_time TIMESTAMP DEFAULT now());
CREATE RULE log_salary_changes AS ON UPDATE TO salary DO ALSO INSERT
  INTO salary_log VALUES (NEW.employee_id, NEW.salary - OLD.salary,
  CURRENT_USER);


