DROP DATABASE IF EXISTS phpcrud;
CREATE DATABASE IF NOT EXISTS phpcrud;

USE phpcrud;

CREATE TABLE register (
	id INT AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(25) NOT NULL,
    last_name varchar(25) NOT NULL,
    email varchar(25) NOT NULL,
    password varchar(100) NOT NULL,
    gender varchar(10) NOT NULL,
    user_role varchar(10) NOT NULL
);

CREATE TABLE reference_code (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name varchar(25) NOT NULL,
    rank INT NOT NULL,
    description varchar(25) NOT NULL,
    datecreated datetime DEFAULT current_timestamp,
    dateupdated timestamp DEFAULT current_timestamp ON UPDATE current_timestamp,
    ref_id varchar(10) NOT NULL,
    group_name varchar(10) NOT NULL
);
            
INSERT INTO reference_code(name, rank, description, ref_id, group_name) VALUES ('Male','1','Gender','g1','g');
INSERT INTO reference_code(name, rank, description, ref_id, group_name) VALUES ('Female','2','Gender','g2','g');
INSERT INTO reference_code(name, rank, description, ref_id, group_name) VALUES ('Single','1','Civil Status','cs1','cs');
INSERT INTO reference_code(name, rank, description, ref_id, group_name) VALUES ('Married','2','Civil Status','cs2','cs');
INSERT INTO reference_code(name, rank, description, ref_id, group_name) VALUES ('Separated','3','Civil Status','cs3','cs');
INSERT INTO reference_code(name, rank, description, ref_id, group_name) VALUES ('Widowed','4','Civi Status','cs4','cs');
INSERT INTO reference_code(name, rank, description, ref_id, group_name) VALUES ('Admin','1','User Role','ur1','ur');
INSERT INTO reference_code(name, rank, description, ref_id, group_name) VALUES ('User','2','User Role','ur2','ur');
INSERT INTO reference_code(name, rank, description, ref_id, group_name) VALUES ('Viewer','3','User Role','ur3','ur');

INSERT INTO register (
	first_name,
    last_name,
    email,
    password,
    gender,
    user_role
) VALUES (
	'Sam',
  'Pol',
  'sam@pol',
  'asdfasdf',
  'g1',
  'ur1'
);

SELECT * FROM register;
SELECT * FROM reference_code;
