/* 
 * Projet  : LoCar
 * Title   : db_testValues
 * Author  : Diogo da Silva Fernandes
 * Version : 1.1
 */

/* Test values for users table */
INSERT INTO users(username,email,password) VALUES ("diogof648","diogof648@gmail.com","PASSWORD");
INSERT INTO users(username,email,password) VALUES ("Stabyloo","stabyloo.lol@hotmail.com","PASSWORD");
INSERT INTO users(username,email,password) VALUES ("GGR","ggr.2005@gmail.com","PASSWORD");
INSERT INTO users(username,email,password) VALUES ("Roketz","roketzer@yahoo.com","PASSWORD");
INSERT INTO users(username,email,password) VALUES ("Paul94","paul94@hotmail.com","PASSWORD");
INSERT INTO users(username,email,password) VALUES ("Liaj0928","liaj0928@gmail.com","PASSWORD");

/* Test values for offers table */
INSERT INTO offers(title, description, price, town, brand, year, image, user_id) VALUES ("Car #1", "DESCRIPTION", 87.45, "Yverdon", "BMW", 2021, "IMAGE", 1);
INSERT INTO offers(title, description, price, town, brand, year, image, user_id) VALUES ("Car #2", "DESCRIPTION", 22.35, "Baulmes", "BMW", 1995, "IMAGE", 3);
INSERT INTO offers(title, description, price, town, brand, year, image, user_id) VALUES ("Car #3", "DESCRIPTION", 40.00, "St-Croix", "Audi", 2002, "IMAGE", 4);
INSERT INTO offers(title, description, price, town, brand, year, image, user_id) VALUES ("Car #4", "DESCRIPTION", 39.99, "Lausanne", "Renault", 1998, "IMAGE", 2);
INSERT INTO offers(title, description, price, town, brand, year, image, user_id) VALUES ("Car #5", "DESCRIPTION", 73.76, "Lausanne", "BMW", 2009, "IMAGE", 1);
INSERT INTO offers(title, description, price, town, brand, year, image, user_id) VALUES ("Car #6", "DESCRIPTION", 872.95, "Lausanne", "Peugeot", 2006, "IMAGE", 5);