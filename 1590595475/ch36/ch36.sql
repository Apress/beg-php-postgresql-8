CREATE TABLE participant (
participantid SERIAL,
name TEXT NOT NULL,
email TEXT NOT NULL,
cash NUMERIC(5,2) NOT NULL,
PRIMARY KEY (participantid)
);

CREATE TABLE trunk (
trunkid SERIAL,
participantid INTEGER NOT NULL REFERENCES participant(participantid),
name TEXT NOT NULL,
price NUMERIC(5,2) NOT NULL,
description TEXT NOT NULL,
PRIMARY KEY (trunkid)
);

INSERT INTO participant (name,email,cash) VALUES
('Robert','robert@example.com','100.00');
INSERT INTO participant (name,email,cash) VALUES
('Howard','howard@example.com','150.00');
INSERT INTO trunk (participantid,name,price,description) VALUES
(1,'Linux CD','1.00','Complete OS on a CD'); 
INSERT INTO trunk (participantid,name,price,description) VALUES
(2,'Abacus','12.99','Low on computing power? Use an abacus!');
INSERT INTO trunk (participantid,name,price,description) VALUES
(2,'Magazines','6.00','Stack of Computer Magazines');

