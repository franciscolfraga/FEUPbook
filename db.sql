CREATE TABLE "users" (
  id SERIAL PRIMARY KEY,
  name varchar NOT NULL,
  email varchar NOT NULL UNIQUE,
  password varchar NOT NULL,
  programid integer,
  profilepic varchar DEFAULT 'media/profile-pics/default.png',
  entityid integer,
  depid integer
);

CREATE TABLE "program" (
  id SERIAL PRIMARY KEY,
  name varchar NOT NULL,
  initials varchar NOT NULL,
  logo varchar NOT NULL,
  depid integer NOT NULL
);

INSERT INTO program  VALUES  (1,'Master in Bioengineering','MIB','media/icons/mib.png', 1);
INSERT INTO program  VALUES  (2,'Master in Civil Engineering','MIEC','media/icons/miec.png', 2);
INSERT INTO program  VALUES  (3,'Master in Environmental Engineering','MIEA','media/icons/miea.png', 8);
INSERT INTO program  VALUES  (4,'Master in Engineering and Industrial Management','MIEIG','media/icons/mieig.png', 4);
INSERT INTO program  VALUES  (5,'Master in Electrical and Computers Engineering','MIEEC','media/icons/mieec.png', 3);
INSERT INTO program  VALUES  (6,'Master in Informatics and Computing Engineering','MIEIC','media/icons/mieic.png', 5);
INSERT INTO program  VALUES  (7,'Master in Mechanical Engineering','MIEM','media/icons/miem.png', 6);
INSERT INTO program  VALUES  (8,'Master in Metallurgical and Materials Engineering','MIEMM','media/icons/miemm.png', 7);
INSERT INTO program  VALUES  (9,'Master in Chemical Engineering','MIEQ','media/icons/mieq.png', 1);
INSERT INTO program  VALUES  (10,'Master in Physical Engineering','MIEF','media/icons/mief.png', 9);


CREATE TABLE "entity" (
  id SERIAL PRIMARY KEY,
  name varchar NOT NULL
);

INSERT INTO entity  VALUES  (1,'Student');
INSERT INTO entity  VALUES  (2,'Professor');
INSERT INTO entity  VALUES  (3,'Employee');

CREATE TABLE "department" (
  id SERIAL PRIMARY KEY,
  name varchar NOT NULL
);

INSERT INTO department  VALUES  (1,'Department of Chemical Engineering');
INSERT INTO department  VALUES  (2,'Department of Civil Engineering ');
INSERT INTO department  VALUES  (3,'Department of Electrical and Computer Engineering');
INSERT INTO department  VALUES  (4,'Department of Industrial Engineering and Management');
INSERT INTO department  VALUES  (5,'Department of Informatics Engineering');
INSERT INTO department  VALUES  (6,'Department of Mechanical Engineering');
INSERT INTO department  VALUES  (7,'Department of Metallurgical and Materials Engineering');
INSERT INTO department  VALUES  (8,'Department of Mining Engineering');
INSERT INTO department  VALUES  (9,'Department of Physics Engineering ');
