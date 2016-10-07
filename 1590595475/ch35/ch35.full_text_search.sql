CREATE TABLE webresource (
   webresourceid SERIAL NOT NULL,
   name TEXT NOT NULL,
   url TEXT NOT NULL,
   description TEXT NOT NULL,
   UNIQUE (name,url),
   PRIMARY KEY (webresourceid)
);

INSERT INTO webresource(name, url, description) VALUES
 ('Ruby Home Page','http://www.ruby-lang.org/','The official
 Ruby website');
INSERT INTO webresource(name, url, description) VALUES
 ('Apache Site','http://httpd.apache.org/','Great Apache site,
 contains Apache 2 manual');
INSERT INTO webresource(name, url, description) VALUES
 ('Planet PostgreSQL', 'http://www.planetpostgresql.org/',
 'PostgreSQL community bloggers');
INSERT INTO webresource(name, url, description) VALUES
 ('PHP: Hypertext Preprocessor','http://www.php.net/',
 'The official PHP website');
INSERT INTO webresource(name, url, description) VALUES
 ('Apache Week','http://www.apacheweek.com/',
 'Offers a dedicated Apache 2 section');

ALTER TABLE webresource ADD COLUMN description_fti_idx tsvector;

CREATE INDEX webresource_description_fts_idx ON webresource USING
 gist(description_fti_idx);

UPDATE webresource SET description_fti_idx = to_tsvector('default',description);


