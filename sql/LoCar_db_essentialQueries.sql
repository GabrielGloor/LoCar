/* 
 * Projet  : LoCar
 * Title   : db_essentialQueries
 * Author  : Diogo da Silva Fernandes
 * Version : 1.0
 */

/* Users table */
SELECT username, email, password FROM users;

INSERT INTO users(username,email,password) VALUES ("USERNAME","EMAIL","PASSWORD");

UPDATE users SET username = "USERNAME", email = "EMAIL", password = "PASSWORD" WHERE username = "USERNAME";

DELETE FROM users WHERE username = "USERNAME";

/* Offers table */
SELECT offerNumber, title, description, price, town, brand, year, image, user_id FROM offers;

INSERT INTO offers(offerNumber, title, description, price, town, brand, year, image, user_id) VALUES (XXXXXXX, "TITLE", "DESCRIPTION", XXXXX.XX, "TOWN", "BRAND", XXXX, "IMAGE", X);

UPDATE offers SET title = "TITLE", description = "DESCRITPION", price = XXXXX.XX, town = "TOWN", brand = "BRAND", year = XXXX, image = "IMAGE", user_id = X WHERE offerNumber = XXXXXXX;

DELETE FROM offers WHERE offerNumber = XXXXXXX;

/* Get the email of the owner of an offer */
SELECT users.email, offers.offerNumber FROM users
INNER JOIN offers ON users.id = offers.user_id
WHERE offers.offerNumber = XXXXXXX;

/*
 * /!\ Notice: Replace X with numbers /!\
 */