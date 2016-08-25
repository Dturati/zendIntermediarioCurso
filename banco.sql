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
	id int PRIMARY KEY UNIQUE auto_increment,
	parent_id int,
    nome varchar(45),
    is_admin boolean,
    created_at datetime,
    updated_at datetime,
    foreign key (parent_id) references sonacl_roles(id)

);
drop table sonacl_roles;
select * from sonacl_roles;			
insert into sonacl_roles(parent_id,nome,is_admin) values(1,'david',true);
truncate table sonacl_roles;

create table sonacl_privileges(
	id int primary key auto_increment unique,
	role_id int,
    resource_id int,
    nome varchar(45),
    created_at datetime,
    update_at datetime,
    foreign key (role_id) references sonacl_roles(id),
    foreign key (resource_id) references sonacl_resources(id)
);
explain sonacl_privileges;
show tables;
drop table sonacl_privileges;
select * from sonacl_privileges;
truncate table sonacl_privileges;

create table sonacl_resources(
	id int primary key unique auto_increment,
    nome varchar(45),
    created_at datetime,
    update_at datetime
);
drop table sonacl_resources;
alter table sonacl_resources change id id int(11) not null unique auto_increment;
explain sonacl_resources;
select * from sonacl_resources;	
