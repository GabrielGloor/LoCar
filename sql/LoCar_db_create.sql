/* 
 * Projet  : LoCar
 * Title   : db_create
 * Author  : Diogo da Silva Fernandes
 * Version : 1.0
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
    password VARCHAR(50) NOT NULL,
    CONSTRAINT PK_User PRIMARY KEY (id),
    CONSTRAINT UniqueUser UNIQUE (username,email)
);

/* Create offers table */
CREATE TABLE offers(
    id INT NOT NULL AUTO_INCREMENT,
    offerNumber INT NOT NULL,
    title NVARCHAR(30) NOT NULL,
    description NVARCHAR(300) NOT NULL,
    price DECIMAL(7,2) NOT NULL,
    town VARCHAR(25) NOT NULL,
    brand VARCHAR(20) NOT NULL,
    year YEAR NOT NULL,
    image VARCHAR(100),
    user_id INT NOT NULL,
    CONSTRAINT PK_User PRIMARY KEY (id),
    CONSTRAINT FK_Users_Offers FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT UniqueOffer UNIQUE (offerNumber)
);

/* Delete the user if he already exists */
DROP USER IF EXISTS 'visitor'@'127.0.0.1';

/* Create the user */
CREATE USER 'visitor'@'127.0.0.1' IDENTIFIED BY 'Pa$$w0rd';
GRANT SELECT ON locar . * TO 'visitor'@'127.0.0.1';