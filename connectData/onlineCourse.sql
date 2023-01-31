CREATE DATABASE onlineCourse;  /*Tạo cơ sở dữ liệu*/
USE onlineCourse  ;/*Sử dụng cơ sở dữ liệu */


/* Tạo bảng */
/*
CSDL gồm 5 bảng:
-Users: Thông tin người sử dụng
-Teachers: Thông tin của giáo viên -**
-Students: Thông tin của học viên
-Admins: Thông tin quản trị viên
-Classes: Thông tin của lớp học
-Subjects: Thông tin môn học
-Fields: Thông tin trường 
-List_of_purchases: Danh sách những khóa học đã mua

*/
use app;

/*Bảng User*/
CREATE TABLE Users(
login_name varchar(255),
primary key(login_name)
)
;


/*Bảng Teacher*/
CREATE TABLE Teachers( 
teacher_id int AUTO_INCREMENT,
first_name varchar(30),
last_name varchar(30),
phone_num varchar(15),
email varchar(255),
degree varchar(300),
login_name varchar(255),
password varchar(255),
primary key(teacher_id), /*Khóa chính customer_id*/
CONSTRAINT fk_loginname_teacher FOREIGN KEY (login_name) REFERENCES Users(login_name)
);

/*Bảng học sinh*/
CREATE TABLE Students( 
student_id int AUTO_INCREMENT,
first_name varchar(30),
last_name varchar(30),
phone_num varchar(15),
email varchar(255),
login_name varchar(255),
password varchar(255),
primary key(student_id), /*Khóa chính customer_id*/
CONSTRAINT fk_loginname_student FOREIGN KEY (login_name) REFERENCES Users(login_name)
);

/*Bảng admin*/
CREATE TABLE Admins( 
ad_id int AUTO_INCREMENT,
first_name varchar(30),
last_name varchar(30),
login_name varchar(255),
password varchar(255),
primary key(ad_id), /*Khóa chính customer_id*/
CONSTRAINT fk_loginname_admin FOREIGN KEY (login_name) REFERENCES Users(login_name)
);

/*Bảng Fields*/
CREATE TABLE Fields(
field_id int AUTO_INCREMENT,
field_name varchar(255),
primary key(field_id)
);

/*Bảng môn học*/
CREATE TABLE Subjects( 
sub_id int AUTO_INCREMENT,
field_id int,
subname varchar(255),
overview varchar(255),
primary key(sub_id), /*Khóa chính customer_id*/
CONSTRAINT fk_field_id FOREIGN KEY (field_id) REFERENCES Fields(field_id)
);

/*Banrglop học*/
CREATE TABLE Classes( 
class_id int AUTO_INCREMENT,
teacher_id int,
sub_id int,
class_size varchar(3),
description varchar(255),
start_time date,
end_time date,
fee varchar(20),
level varchar(50),
primary key(class_id), /*Khóa chính customer_id*/
CONSTRAINT fk_teacherid FOREIGN KEY (teacher_id) REFERENCES Teachers(teacher_id),
CONSTRAINT fk_subjectid FOREIGN KEY (sub_id) REFERENCES Subjects(sub_id)
);

/*Bảng khóa học đã mua*/
CREATE TABLE List_of_purchases( 
class_id int ,
student_id int,
evaluation_scores float,
voting_rate float,
primary key(class_id,student_id), /*Khóa chính customer_id*/
CONSTRAINT fk_classid_purchase FOREIGN KEY (class_id) REFERENCES Classes(class_id),
CONSTRAINT fk_studentid_purchase FOREIGN KEY (student_id) REFERENCES Students(student_id)
);


