/* tables */

CREATE TABLE mediatype (
  id SERIAL PRIMARY KEY,
  name VARCHAR(32),
  location VARCHAR(256)
);

CREATE TABLE circletype (
  id SERIAL PRIMARY KEY,
  name VARCHAR(32)
);

CREATE TABLE membertype (
  id SERIAL PRIMARY KEY,
  name VARCHAR(32)
);

-- "memberid" column will be inserted later
CREATE TABLE post (
  id SERIAL PRIMARY KEY,
  timest TIMESTAMP NOT NULL,
  message VARCHAR/*,
  memberid INTEGER NOT NULL REFERENCES member */
);

CREATE TABLE media (
  id SERIAL PRIMARY KEY,
  name VARCHAR(32) NOT NULL UNIQUE,
  typeid INTEGER NOT NULL REFERENCES mediatype,
  postid INTEGER REFERENCES post
);

CREATE TABLE member (
  id SERIAL PRIMARY KEY,
  name VARCHAR(128) NOT NULL,
  email VARCHAR(32) NOT NULL UNIQUE,
  password VARCHAR(256) NOT NULL,
  membertypeid INTEGER REFERENCES membertype,
  profilepic INTEGER REFERENCES media
);

-- adding "memberid" column to "post" table AFTER "member" table creation
ALTER TABLE post
ADD memberid INTEGER NOT NULL REFERENCES member;

CREATE TABLE session (
  id SERIAL PRIMARY KEY,
  initialts TIMESTAMP NOT NULL,
  finalts TIMESTAMP,
  memberid INTEGER NOT NULL REFERENCES member
);

CREATE TABLE circle (
  id SERIAL PRIMARY KEY,
  typeid INTEGER NOT NULL REFERENCES circletype
);

CREATE TABLE department (
  id SERIAL PRIMARY KEY,
  name VARCHAR(128) NOT NULL UNIQUE,
  initials VARCHAR(16) NOT NULL UNIQUE,
  circleid INTEGER NOT NULL UNIQUE REFERENCES circle
);

CREATE TABLE program (
  id SERIAL PRIMARY KEY,
  name VARCHAR(128) NOT NULL UNIQUE,
  initials VARCHAR(16) NOT NULL UNIQUE,
  deptid INTEGER NOT NULL REFERENCES department,
  logo INTEGER UNIQUE REFERENCES media,
  circleid INTEGER NOT NULL UNIQUE REFERENCES circle
);

CREATE TABLE course (
  id SERIAL PRIMARY KEY,
  name VARCHAR(128) NOT NULL,
  initials VARCHAR(16) NOT NULL,
  year VARCHAR(16) NOT NULL,
  semester VARCHAR(16) NOT NULL,
  progid INTEGER NOT NULL REFERENCES program,
  circleid INTEGER NOT NULL UNIQUE REFERENCES circle
);

CREATE TABLE class (
  id SERIAL PRIMARY KEY,
  reference VARCHAR(16) NOT NULL,
  courseid INTEGER NOT NULL REFERENCES course,
  circleid INTEGER NOT NULL UNIQUE REFERENCES circle
);

CREATE TABLE workgroup (
  id SERIAL PRIMARY KEY,
  reference VARCHAR(16) NOT NULL,
  classid INTEGER NOT NULL REFERENCES class,
  circleid INTEGER NOT NULL UNIQUE REFERENCES circle
);

CREATE TABLE postedin (
  postid INTEGER REFERENCES post,
  circleid INTEGER REFERENCES circle,
  PRIMARY KEY (postid, circleid)
);

CREATE TABLE partof (
  memberid INTEGER REFERENCES member,
  circleid INTEGER REFERENCES circle,
  PRIMARY KEY (memberid, circleid)
);

CREATE TABLE notification (
  id SERIAL PRIMARY KEY,
  readstatus BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE notifying (
  notid INTEGER REFERENCES notification,
  memberid INTEGER REFERENCES member,
  PRIMARY KEY (notid, memberid)
);

CREATE TABLE chat (
  id SERIAL PRIMARY KEY,
  circleid INTEGER NOT NULL UNIQUE REFERENCES circle
);

CREATE TABLE chatentry (
  id SERIAL PRIMARY KEY,
  timest TIMESTAMP NOT NULL,
  message VARCHAR NOT NULL,
  chatid INTEGER NOT NULL REFERENCES chat,
  memberid INTEGER NOT NULL REFERENCES member
);

/* INSERTIONS */

-- Mediatypes

INSERT INTO mediatype VALUES (1,'Program Logo','media/icons/');
INSERT INTO mediatype VALUES (2,'Profile Pics','media/profile-pics/');
INSERT INTO mediatype VALUES (3,'Post Pics','media/post-pics/');
INSERT INTO mediatype VALUES (4,'Post Video','media/post-video/');
INSERT INTO mediatype VALUES (5,'Post Audio','media/post-audio/');
INSERT INTO mediatype VALUES (6,'Post Other','media/post-other/');

-- Circletypes

INSERT INTO circletype VALUES (1,'Department');
INSERT INTO circletype VALUES (2,'Program');
INSERT INTO circletype VALUES (3,'Course');
INSERT INTO circletype VALUES (4,'Class');
INSERT INTO circletype VALUES (5,'Workgroup');
INSERT INTO circletype VALUES (6,'Admin');
INSERT INTO circletype VALUES (7,'AdHoc');
INSERT INTO circletype VALUES (8,'Global');

-- Membertypes

INSERT INTO membertype VALUES (1,'Student');
INSERT INTO membertype VALUES (2,'Professor');
INSERT INTO membertype VALUES (3,'Employee');
INSERT INTO membertype VALUES (4,'Admin');

-- Create global circle

INSERT INTO circle VALUES (DEFAULT, 8);

-- Departments

INSERT INTO circle VALUES (DEFAULT, 1);
INSERT INTO department VALUES (1,'Department of Chemical Engineering','DEQ',currval('circle_id_seq'));
INSERT INTO circle VALUES (DEFAULT, 1);
INSERT INTO department VALUES (2,'Department of Civil Engineering ','DEC',currval('circle_id_seq'));
INSERT INTO circle VALUES (DEFAULT, 1);
INSERT INTO department VALUES (3,'Department of Electrical and Computer Engineering','DEEC',currval('circle_id_seq'));
INSERT INTO circle VALUES (DEFAULT, 1);
INSERT INTO department VALUES (4,'Department of Industrial Engineering and Management','DEGI',currval('circle_id_seq'));
INSERT INTO circle VALUES (DEFAULT, 1);
INSERT INTO department VALUES (5,'Department of Informatics Engineering','DEI',currval('circle_id_seq'));
INSERT INTO circle VALUES (DEFAULT, 1);
INSERT INTO department VALUES (6,'Department of Mechanical Engineering','DEMEC',currval('circle_id_seq'));
INSERT INTO circle VALUES (DEFAULT, 1);
INSERT INTO department VALUES (7,'Department of Metallurgical and Materials Engineering','DEMM',currval('circle_id_seq'));
INSERT INTO circle VALUES (DEFAULT, 1);
INSERT INTO department VALUES (8,'Department of Mining Engineering','DEM',currval('circle_id_seq'));
INSERT INTO circle VALUES (DEFAULT, 1);
INSERT INTO department VALUES (9,'Department of Physics Engineering','DEF',currval('circle_id_seq'));

-- Default Profile Picture (media.id = 1)

INSERT INTO media VALUES (DEFAULT, 'default.png', 2, NULL);

-- Programs

INSERT INTO media VALUES (DEFAULT,'mib.png',1,NULL);
INSERT INTO circle VALUES (DEFAULT, 2);
INSERT INTO program VALUES (1,'Master in Bioengineering','MIB',1,currval('media_id_seq'),currval('circle_id_seq'));
INSERT INTO media VALUES (DEFAULT,'miec.png',1,NULL);
INSERT INTO circle VALUES (DEFAULT, 2);
INSERT INTO program VALUES (2,'Master in Civil Engineering','MIEC',2,currval('media_id_seq'),currval('circle_id_seq'));
INSERT INTO media VALUES (DEFAULT,'miea.png',1,NULL);
INSERT INTO circle VALUES (DEFAULT, 2);
INSERT INTO program VALUES (3,'Master in Environmental Engineering','MIEA',8,currval('media_id_seq'),currval('circle_id_seq'));
INSERT INTO media VALUES (DEFAULT,'mieig.png',1,NULL);
INSERT INTO circle VALUES (DEFAULT, 2);
INSERT INTO program VALUES (4,'Master in Engineering and Industrial Management','MIEIG',4,currval('media_id_seq'),currval('circle_id_seq'));
INSERT INTO media VALUES (DEFAULT,'mieec.png',1,NULL);
INSERT INTO circle VALUES (DEFAULT, 2);
INSERT INTO program VALUES (5,'Master in Electrical and Computers Engineering','MIEEC',3,currval('media_id_seq'),currval('circle_id_seq'));
INSERT INTO media VALUES (DEFAULT,'mieic.png',1,NULL);
INSERT INTO circle VALUES (DEFAULT, 2);
INSERT INTO program VALUES (6,'Master in Informatics and Computing Engineering','MIEIC',5,currval('media_id_seq'),currval('circle_id_seq'));
INSERT INTO media VALUES (DEFAULT,'miem.png',1,NULL);
INSERT INTO circle VALUES (DEFAULT, 2);
INSERT INTO program VALUES (7,'Master in Mechanical Engineering','MIEM',6,currval('media_id_seq'),currval('circle_id_seq'));
INSERT INTO media VALUES (DEFAULT,'miemm.png',1,NULL);
INSERT INTO circle VALUES (DEFAULT, 2);
INSERT INTO program VALUES (8,'Master in Metallurgical and Materials Engineering','MIEMM',7,currval('media_id_seq'),currval('circle_id_seq'));
INSERT INTO media VALUES (DEFAULT,'mieq.png',1,NULL);
INSERT INTO circle VALUES (DEFAULT, 2);
INSERT INTO program VALUES (9,'Master in Chemical Engineering','MIEQ',1,currval('media_id_seq'),currval('circle_id_seq'));
INSERT INTO media VALUES (DEFAULT,'mief.png',1,NULL);
INSERT INTO circle VALUES (DEFAULT, 2);
INSERT INTO program VALUES (10,'Master in Physical Engineering','MIEF',9,currval('media_id_seq'),currval('circle_id_seq'));
