/* 
 * Projet  : LoCar
 * Title   : db_create
 * Author  : Diogo da Silva Fernandes
 * Version : 1.2
 */

/* Delete the database if it already exist */
DROP DATABASE IF EXISTS locar;

/* Create the database and use it in the whole file */
CREATE DATABASE locar;
USE locar;

/* Create users table */
CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(320) NOT NULL,
    password VARCHAR(255) NOT NULL,
    CONSTRAINT PK_User PRIMARY KEY (id),
    CONSTRAINT UniqueUser UNIQUE (username,email)
);

/* Create offers table */
CREATE TABLE offers(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    description VARCHAR(300) NOT NULL,
    price DECIMAL(7,2) NOT NULL,
    town VARCHAR(25) NOT NULL,
    brand VARCHAR(20) NOT NULL,
    year YEAR NOT NULL,
    imageName VARCHAR(20),
    user_id INT NOT NULL,
    CONSTRAINT PK_Offer PRIMARY KEY (id),
    CONSTRAINT FK_Users_Offers FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT UniqueOffer UNIQUE (title,user_id)
);

/* Update offers table to set AUTO_INCREMENT start to 192168 */
ALTER TABLE offers AUTO_INCREMENT = 192168;

/* Delete the user if he already exists */
DROP USER IF EXISTS 'db_master'@'localhost';

/* Create the user */
CREATE USER 'db_master'@'localhost' IDENTIFIED BY 'Pa$$w0rd';
GRANT SELECT, INSERT, UPDATE ON locar . * TO 'db_master'@'localhost';