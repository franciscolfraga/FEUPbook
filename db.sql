CREATE TABLE "users" (
  id SERIAL PRIMARY KEY,
  name varchar NOT NULL,
  email varchar NOT NULL UNIQUE,
  password varchar NOT NULL,
  programid integer,
  profilepic varchar DEFAULT 'media/profile-pics/default.png'
);

CREATE TABLE "program" (
  id SERIAL PRIMARY KEY,
  name varchar NOT NULL,
  initials varchar NOT NULL,
  logo varchar NOT NULL
);

INSERT INTO program  VALUES  (1,'Master in Bioengineering','MIB','media/icons/mib.png');
INSERT INTO program  VALUES  (2,'Master in Civil Engineering','MIEC','media/icons/miec.png');
INSERT INTO program  VALUES  (3,'Master in Environmental Engineering','MIEA','media/icons/miea.png');
INSERT INTO program  VALUES  (4,'Master in Engineering and Industrial Management','MIEIG','media/icons/mieig.png');
INSERT INTO program  VALUES  (5,'Master in Electrical and Computers Engineering','MIEEC','media/icons/mieec.png');
INSERT INTO program  VALUES  (6,'Master in Informatics and Computing Engineering','MIEIC','media/icons/mieic.png');
INSERT INTO program  VALUES  (7,'Master in Mechanical Engineering','MIEM','media/icons/miem.png');
INSERT INTO program  VALUES  (8,'Master in Metallurgical and Materials Engineering','MIEMM','media/icons/miemm.png');
INSERT INTO program  VALUES  (9,'Master in Chemical Engineering','MIEQ','media/icons/mieq.png');
INSERT INTO program  VALUES  (10,'Master Degree in Physical Engineering','MIEF','media/icons/mief.png');
