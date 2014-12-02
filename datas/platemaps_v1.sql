create database pmaps;

use pmaps;

show tables;

create table province(
	province_id int primary key auto_increment,
    province_name varchar(20),
    province_latitude decimal(9,6),
    province_longitude decimal(9,6)
);

create table regency(
	regency_id int primary key auto_increment,
    regency_name varchar(20),
    regency_latitude decimal(9,6),
    regency_longitude decimal(9,6),
    province_id int,
    foreign key(province_id) references province(province_id)
		on delete cascade
);

create table district(
	district_id int primary key auto_increment,
    district_name varchar(20),
	district_latitude decimal(9,6),
    district_longitude decimal(9,6),
    regency_id int,
    foreign key(regency_id) references regency(regency_id)
		on delete cascade
);

create table village(
	village_id int primary key auto_increment,
    village_name varchar(20),
	village_latitude decimal(9,6),
    village_longitude decimal(9,6),
    district_id int,
    foreign key(district_id) references district(district_id) 
		on delete cascade
);

create table images(
	images_id int primary key auto_increment,
    images_path varchar(100),
    images_filename varchar(50),
    images_ext varchar(10),
    images_size int,
    images_status int,
    images_x int,
    images_y int
);

create table privilege(
	privilege_id int primary key auto_increment,
    privilege_level int,
    privilege_name varchar(20)
);

create table users(
	users_id int primary key auto_increment,
    users_uname varchar(50),
    users_password varchar(100),
    users_email varchar(50),
    users_phone varchar(20),
    users_birthdate date,
    users_security_question text,
    users_security_answer text,
    users_address varchar(80),
    images_id int,
    privilege_id int,
    users_status int,
    foreign key(images_id) references images(images_id) on delete cascade,
    foreign key(privilege_id) references privilege(privilege_id) on delete cascade
);

create table company(
	company_id int primary key auto_increment,
    company_name varchar(30),
    company_email varchar(50),
    company_address varchar(100),
    company_latitude decimal(9,6),
    company_longitude decimal(9,6),
    company_facebook varchar(50),
    company_twitter varchar(50),
    company_instagram varchar(50),
    company_googleplus varchar(50)
);

create table worktime(
	worktime_id int primary key auto_increment,
    sunday_open time,
    monday_open time,
    tuesday_open time,
    wednesday_open time,
    thursday_open time,
    friday_open time,
    saturday_open time,
    
    sunday_close time,
    monday_close time,
    tuesday_close time,
    wednesday_close time,
    thursday_close time,
    friday_close time,
    saturday_close time,
    special text
);

create table restaurant(
	restaurant_id int primary key auto_increment,
    restaurant_name varchar(50),
    restaurant_email varchar(50),
    restaurant_address varchar(100),
    restaurant_latitude decimal(9,6),
    restaurant_longitude decimal(9,6),
    restaurant_halal int,
    village_id int,
    company_id int,
    restaurant_wifi int,
    restaurant_sarea int,
    restaurant_ac int,
    restaurant_bs int,
    restaurant_pmotor int,
    restaurant_pmobil int,
    restaurant_mr int,
    restaurant_bar int,
    restaurant_buffet int,
    restaurant_pay_cc int,
    restaurant_tax decimal,
    restaurant_service decimal,
    restaurant_awards text,
    restaurant_tags text,
    worktime_id int,
    images_id int,
    foreign key(village_id) references village(village_id) on delete cascade,
    foreign key(company_id) references company(company_id) on delete cascade,
    foreign key(worktime_id) references worktime(worktime_id) on delete cascade,
    foreign key(images_id) references images(images_id) on delete cascade
);

create table foodtype(
	foodtype_id int primary key auto_increment,
    foodtype_name varchar(20)
);

create table cuisine(
	cuisine_id int primary key auto_increment,
    cuisine_name varchar(20),
    cuisine_desc text,
    cuisine_display int
);

create table comments(
	comment_id int primary key auto_increment,
    comment_content text,
    comment_status int,
    comment_for varchar(50),
    users_id int,
    foreign key(user_id) references users(users_id) on delete cascade
);

create table menu(
	menu_id int primary key auto_increment,
    menu_name varchar(50),
    menu_price int,
    menu_description text,
    foodtype_id int,
    cuisine_id int,
    restaurant_id int,
    foreign key(foodtype_id) references foodtype(foodtype_id) on delete cascade,
    foreign key(cuisine_id) references cuisine(cuisine_id) on delete cascade,
    foreign key(restaurant_id) references restaurant(restaurant_id) on delete cascade
);

create table comments(
	comment_id int primary key auto_increment,
    comment_content text,
    comment_status int,
    comment_for varchar(30),
    users_id int,
    foreign key(users_id) references users(users_id) on delete cascade
);

create table review(
	review_id int primary key auto_increment,
    review_value int,
    review_dateadd date,
    comment_id int,
    restaurant_id int,
    users_id int,
    foreign key(comment_id) references comments(comment_id) on delete cascade,
    foreign key(restaurant_id) references restaurant(restaurant_id) on delete cascade,
    foreign key(users_id) references users(users_id) on delete cascade
);


alter table company 
	add column users_id int,
    add foreign key(users_id) references users(users_id) on delete cascade;