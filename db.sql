create database march14;
use march14;
create table up_fs
(
	fileid	int(4) primary key auto_increment,
	filename varchar(40),
	filetype varchar(40),
	filesize int(8),
	filepath varchar(255)
);


create table up_db
(
	fileid	int(4) primary key auto_increment,
	filename varchar(40),
	filetype varchar(40),
	filesize int(8),
	filedata mediumblob
);