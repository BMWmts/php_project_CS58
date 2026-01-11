create database myDatabase charset utf8mb4;
use myDatabase;
create table members (
    id int auto_increment primary key,
    userID varchar(100) unique not null,
    passKey varchar(100) not null,
    name varchar(100) not null,
    email varchar(100) not null,
    mobile varchar(10) not null,
    gender enum('male', 'female') not null
);
insert into members (userID, passKey, name, email, mobile, gender)
values (
        '1001',
        '123456',
        'John Doe',
        'john.doe@example.com',
        '1234567890',
        'male'),
        (
        '1002',
        '123456',
        'Jane Doe',
        'jane.doe@example.com',
        '0987654321',
        'female');