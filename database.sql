CREATE DATABASE tendo_school;
USE tendo_school;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    fullname VARCHAR(100)
);

CREATE TABLE classes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(30)
);

CREATE TABLE students(
    id INT AUTO_INCREMENT PRIMARY KEY,
    admission_no VARCHAR(30),
    fullname VARCHAR(100),
    gender VARCHAR(10),
    dob DATE,
    class_id INT,
    guardian_name VARCHAR(100),
    guardian_phone VARCHAR(30),
    photo VARCHAR(100)
);

CREATE TABLE subjects(
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(100)
);

CREATE TABLE student_subjects(
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    subject_id INT
);

CREATE TABLE results(
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    subject_id INT,
    test_mark INT,
    exam_mark INT,
    total INT,
    grade VARCHAR(2)
);
