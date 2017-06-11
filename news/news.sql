set table_type=InnoDB;
show variables like 'table_type';
SET character_set_client = gbk ;
SET character_set_connection = gbk ;
SET character_set_database = gbk ;
SET character_set_results = gbk ;
SET character_set_server = gbk ;
SET collation_connection = gbk_chinese_ci ;
SET collation_database = gbk_chinese_ci ;
SET collation_server = gbk_chinese_ci ;
show variables like 'character%';
show variables like 'collation%';

create database news;
use news;
create table category(
	category_id int auto_increment primary key,
	name char(20) not null
);
create table users(
	user_id int auto_increment primary key,
	name char(20) not null,
	password char(32)
);
create table news(
	news_id int auto_increment primary key,
	user_id int,
	category_id int,
	title char(100) not null,
	content text,
	publish_time datetime,
	clicked int,
	attachment char(100),
	constraint FK_news_user foreign key (user_id) references users(user_id),
	constraint FK_news_category foreign key (category_id) references category(category_id)
);
create table review(
	review_id int auto_increment primary key,
	news_id int,
	content text,
	publish_time datetime,
	state char(10),
	ip char(15),
	constraint FK_review_news foreign key (news_id) references news(news_id)
);
