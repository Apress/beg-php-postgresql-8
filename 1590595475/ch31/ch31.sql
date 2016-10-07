CREATE TABLE product (
	productid SERIAL,
	productcode VARCHAR(8) NOT NULL UNIQUE,
	name TEXT NOT NULL,
	price NUMERIC(5,2) NOT NULL,
	description TEXT NOT NULL,
	PRIMARY KEY(productid)
);

INSERT INTO product (productid, productcode, name, price, description)
	VALUES(DEFAULT,'tshirt01','PHP T-Shirt',12.99,'');
INSERT INTO product (productid, productcode, name, price, description)
	VALUES(DEFAULT,,'PostgreSQL Coffee Cup',4.99,'');


INSERT INTO product (productid, productcode, name, price, description)
	VALUES(DEFAULT,,'PHP Coffee Cup',3.99,'');
INSERT INTO product (productid, productcode, name, price, description)
	VALUES(DEFAULT,,'Linux Hat',8.99,'');
INSERT INTO product (productid, productcode, name, price, description)
	VALUES(DEFAULT,,'Ruby Hat',16.99,'');
