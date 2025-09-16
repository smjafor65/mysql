mysql -u root -p

show databases;
create database if not EXISTS batch66;
use batch66;

describe students;
DROP database;
Drop table;
show tables;


create table IF NOT EXISTS users(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    email varchar(35)  NOT NULL,
    password varchar(30),
    contact varchar(20),
    role_id INT,
    );

    

    --show data from table

    select id, name, result from students;

    insert into users (name,email,password,contact,role_id)VALUES
    ("Kajol","smjafor66@gmail.com","12345","017xxxxxxx",1),
    ("Rony","smjafor66@gmail.com","12345","017xxxxxxx",12),
    ("Shajal","smjafor66@gmail.com","12345","017xxxxxxx",13),
    ("Sakib","smjafor66@gmail.com","12345","017xxxxxxx",14),
    ("Sumon","smjafor66@gmail.com","12345","017xxxxxxx",15),
    ("Fahad","smjafor66@gmail.com","12345","017xxxxxxx",16);
   

    -- practice
     create table student(
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        name varchar(50) NOT NULL, 
     result varchar(20)
     );

     insert into student(name, result) VALUES
     ("Manik", "80"),
     ("Manik", "80"),
     ("Manik", "80"),
     ("Manik", "80");


    export or backup 
    
    export or backup only on data table
    mysqldump -u root -p class> e:/class.sql

    export or backup only structure
     mysqldump -u root -p --no-data class> "E:\schemaOnlyTable_structure.sql"

     update students set age="25" where id=1;
     update students set age="25" where id=1;