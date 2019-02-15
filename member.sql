drop database if exists zoo;
create database zoo default character set utf8 collate utf8_general_ci;
grant all on zoo.* to 'staff'@'localhost' identified by 'password';
use zoo;

create table member (
	id int auto_increment primary key,
	name varchar(200) not null,
	age int not null
);

insert into member values(null, 'しろくま', 20);
insert into member values(null, 'ライオン', 50);
insert into member values(null, 'クロヒョウ', 15);
insert into member values(null, 'チンパンジー', 30);
insert into member values(null, '山猫', 18);
