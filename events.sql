DROP DATABASE IF EXISTS events;
CREATE DATABASE events;
USE events;

CREATE TABLE artist
(
artist_id INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
descr NVARCHAR(30) NOT NULL
);
INSERT INTO artist (descr) VALUES ('Zoe');
INSERT INTO artist (descr) VALUES ('Caifanes');
INSERT INTO artist (descr) VALUES ('CafeTacvba');
INSERT INTO artist (descr) VALUES ('DLD');
INSERT INTO artist (descr) VALUES ('Los Claxons');


CREATE TABLE day (
day_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name_day NVARCHAR(50) NOT NULL
);
INSERT INTO day (name_day) VALUES ('Viernes 19 de Marzo 2020');
INSERT INTO day (name_day) VALUES ('Sábado 20 de Marzo 2020');
INSERT INTO day (name_day) VALUES ('Domingo 21 de Marzo 2020');


CREATE TABLE stage (
stage_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
stage_name NVARCHAR(50) NOT NULL
);

INSERT INTO stage (stage_name) VALUES ('Escenario Latin Live');
INSERT INTO stage (stage_name) VALUES ('Escenario VIVE');
INSERT INTO stage (stage_name) VALUES ('Escenario Coca Cola');



CREATE TABLE users (
users_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_name NVARCHAR(50) NOT NULL,
passwords NVARCHAR(50) NOT NULL,
UNIQUE(user_name)
);
INSERT INTO users (user_name, passwords) VALUES ('MajoU',1234);
INSERT INTO users (user_name, passwords) VALUES ('AdriU',1234);
INSERT INTO users (user_name, passwords) VALUES ('RochaU',1234);
INSERT INTO users (user_name, passwords) VALUES ('AlanU',1234);
INSERT INTO users (user_name, passwords) VALUES ('MarioU',1234);


CREATE TABLE itinerary (
itinerary_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
artist_id INT NOT NULL REFERENCES artist(artist_id),
stage_id INT NOT NULL REFERENCES stage(stage_id),
day_id INT NOT NULL REFERENCES day(day_id)
);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (1,1,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (2,1,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (3,1,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (4,1,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (5,2,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (6,2,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (7,2,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (8,2,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (9,3,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (10,3,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (11,3,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (12,3,1);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (13,1,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (14,1,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (15,1,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (16,1,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (17,2,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (18,2,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (19,2,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (20,2,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (21,3,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (22,3,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (23,3,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (24,3,2);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (25,1,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (26,1,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (27,1,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (28,1,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (29,2,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (30,2,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (31,2,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (32,2,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (33,3,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (34,3,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (35,3,3);
INSERT INTO itinerary (artist_id, stage_id, day_id) VALUES (36,3,3);

CREATE TABLE meet (
meet_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
artist_id INT NOT NULL REFERENCES artist(artist_id),
stage_id INT NOT NULL REFERENCES stage(stage_id),
day_id INT NOT NULL REFERENCES day(day_id)
);
INSERT INTO meet (artist_id, stage_id,day_id) VALUES (1,1,1);
INSERT INTO meet (artist_id, stage_id,day_id) VALUES (5,2,1);
INSERT INTO meet (artist_id, stage_id,day_id) VALUES (9,3,1);
INSERT INTO meet (artist_id, stage_id,day_id) VALUES (13,1,2);
INSERT INTO meet (artist_id, stage_id,day_id) VALUES (17,2,2);
INSERT INTO meet (artist_id, stage_id,day_id) VALUES (23,3,2);
INSERT INTO meet (artist_id, stage_id,day_id) VALUES (29,2,3);
INSERT INTO meet (artist_id, stage_id,day_id) VALUES (33,1,3);


CREATE TABLE meet_user (
meet_user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
users_id INT NOT NULL REFERENCES users(users_id),
meet_id INT NOT NULL REFERENCES meet(meet_id)
);
INSERT INTO meet_user (users_id, meet_id) VALUES (1,1);
INSERT INTO meet_user (users_id, meet_id) VALUES (1,2);
INSERT INTO meet_user (users_id, meet_id) VALUES (2,3);
INSERT INTO meet_user (users_id, meet_id) VALUES (2,1);
INSERT INTO meet_user (users_id, meet_id) VALUES (3,4);
INSERT INTO meet_user (users_id, meet_id) VALUES (4,5);
INSERT INTO meet_user (users_id, meet_id) VALUES (5,5);



CREATE TABLE disp(
disp_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
num INT NOT NULL,
descr NVARCHAR(50) NOT NULL
);
INSERT INTO disp (num, descr) VALUES (7000, '7 mil personas TICKET_DAY' );   
INSERT INTO disp (num, descr) VALUES (3000, '3 mil personas TICKET_DAY_VIP');
INSERT INTO disp (num, descr) VALUES (7000, '7 mil personas TICKET_ALL');    
INSERT INTO disp (num, descr) VALUES (3000, '3 mil personas TICKET_ALL_VIP');


CREATE TABLE ticket
(
    ticket_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    disp_id INT NOT NULL REFERENCES disp(disp_id),
    ticket_name NVARCHAR(50) NOT NULL,
    price FLOAT(6,2) NOT NULL,
    descr NVARCHAR(255) NOT NULL
);
INSERT INTO ticket (disp_id, ticket_name, price, descr) VALUES (1,'Pase por dia',800.00,'Pase para tu dia favorito, acceso a todos los escenarios');
INSERT INTO ticket (disp_id, ticket_name, price, descr) VALUES (2,'VIP por dia',1500.00, 'Pase para tu dia favorito, acceso a la mejor zona de todos los escenarios');
INSERT INTO ticket (disp_id, ticket_name, price, descr) VALUES (1,'Pase completo',2000.00,'Pase para todos los dias, acceso a todos los escenarios');
INSERT INTO ticket (disp_id, ticket_name, price, descr) VALUES (2,'Pase completo VIP',3750.00,'Pase para todos los dias, acceso a la mejor zona de todos los escenarios');
INSERT INTO ticket (disp_id, ticket_name, price, descr) VALUES (1,'Meet&Greet',4500.00,'Pase para conocer y convivir con tu artista favorito');

CREATE TABLE history (
history_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
users_id INT NOT NULL  REFERENCES users(users_id),
ticket_id INT NOT NULL REFERENCES ticket(ticket_id),
day_id INT NOT NULL REFERENCES day(day_id)
);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (1,1,1);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (2,2,2);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (3,3,3);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (4,4,1);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (5,5,3);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (1,5,2);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (2,4,1);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (3,3,3);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (4,2,1);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (5,1,2);


CREATE TABLE admins (
admins_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
admin_name NVARCHAR(50) NOT NULL,
passwords NVARCHAR(50) NOT NULL
);
INSERT INTO admins(admin_name, passwords) VALUES('Majo',1234);
INSERT INTO admins(admin_name, passwords) VALUES('Adriana',1234);
INSERT INTO admins(admin_name, passwords) VALUES('Rochi',1234);
INSERT INTO admins(admin_name, passwords) VALUES('Alan',1234);
INSERT INTO admins(admin_name, passwords) VALUES('Mario',1234);


/********************VISTAS*************************/

CREATE VIEW itinerary_view AS
SELECT i.itinerary_id AS '#',
a.descr AS 'Famoso',
s.stage_name AS 'Escenario',
d.name_day AS 'Dia'
FROM artist a
INNER JOIN itinerary i
ON a.artist_id = i.artist_id
INNER JOIN stage s
ON s.stage_id = i.stage_id
INNER JOIN day d
ON d.day_id = i.day_id;

CREATE VIEW history_view AS 
SELECT h.history_id AS '#',
u.user_name AS 'Nombre',
t.ticket_name AS 'Descripción',
t.price AS 'Precio'
FROM users u
INNER JOIN history h
ON u.users_id = h.users_id
INNER JOIN ticket t
ON h.ticket_id = t.ticket_id;

CREATE VIEW u_history_view AS 
SELECT h.history_id AS '#',
u.users_id AS 'id',
u.user_name AS 'Nombre',
t.ticket_name AS 'Descr',
d.name_day AS 'Dia',
t.price AS 'Precio'
FROM users u
INNER JOIN history h
ON u.users_id = h.users_id
INNER JOIN ticket t
ON h.ticket_id = t.ticket_id
INNER JOIN day d
ON d.day_id = h.day_id;

/*CREATE VIEW ticket_view AS
SELECT t.ticket_id AS '#',
t.descr AS 'Descripción',
t.price AS 'Precio'
FROM day d
INNER JOIN ticket t
ON d.day_id = t.day_id;*/


CREATE VIEW meet_view AS
SELECT m.meet_id AS '#',
a.descr AS 'Famoso',
s.stage_name AS 'Nombre del escenario',
d.name_day AS 'Día'
FROM artist a
INNER JOIN meet m
ON a.artist_id = m.artist_id
INNER JOIN stage s
ON s.stage_id = m.stage_id
INNER JOIN day d
ON d.day_id = m.day_id;

select * from u_history_view;

