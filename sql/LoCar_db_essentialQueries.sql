/* 
 * Projet  : LoCar
 * Title   : db_essentialQueries
 * Author  : Diogo da Silva Fernandes
 * Version : 1.3
 */

/* Select the user infos */
SELECT username, email, password FROM users;

/* Create a new user */
INSERT INTO users(username,email,password) VALUES ("diogof648","diogof648@gmail.com","Pa$$w0rd");

/* Update the user infos */
UPDATE users SET username = "diogof647", email = "diogof647@gmail.com", password = "Password" WHERE username = "diogof648";

/* Select all offers */
SELECT id, title, price, town, imageName FROM offers;

/* Select the offer details */
SELECT offers.id, offers.title, offers.description, offers.price, offers.town, offers.brand, offers.year, offers.imageName, users.email FROM users
INNER JOIN offers ON users.id = offers.user_id
WHERE offers.id = 192168;

/* Create a new offer */
INSERT INTO offers(title, description, price, town, brand, year, imageName, user_id) VALUES ("Audi A8", "Magnifique audi A8", 192.55, "Yverdon", "Audi", 2003, "img/offer_img/audi_a8.png", 2);

/* Update the offer details */
UPDATE offers SET title = "Audi A7", description = "Magnifique audi A7", price = 92.55, town = "Yverdon-Les-Bains", brand = "AAudi", year = 2004, imageName = "img/offer_img/audi_a7.png", user_id = 2 WHERE id = 192174;