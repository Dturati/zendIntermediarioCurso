CREATE DATABASE zend_intermediario;
use zend_intermediario;

CREATE TABLE sonuser_users(
	id				INT(11) AUTO_INCREMENT UNIQUE primary key,
    nome 			VARCHAR(255),
    email 			VARCHAR(255),
    password		VARCHAR(255),
    salt			VARCHAR(255),
    active			TINYINT(1),
    activation_key	VARCHAR(255),
    update_at		DATETIME,
    create_at		DATETIME		
);
SELECT * FROM sonuser_users;		
DROP TABLE sonuser_users;

create table sonacl_roles(
	  id int PRIMARY KEY,
	  parent_id int,
    nome varchar(45),
    is_admin boolean,
    created_at datetime,
    updated_at datetime

);
drop table sonacl_roles;

create table sonacl_resources(
	id int,
    nome varchar(45),
    created_at datetime,
    update_at datetime
);

create table sonacl_privilleges(
	id int,
	role_id int,
    resource_id int,
    nome varchar(45),
    created_at datetime,
    update_at datetime
);