-- Use this user to login and test (admin account). The password is "peterfinder".
INSERT INTO users(username, email, password) VALUES ('test', 'guy@gmail.com', '$2y$10$vv10RThBQed/x.PDVnfkk.a7cbOv9SVGSPlGsVIIcJtJn2PrAr5IS');
-- Below are sample users, whose password is the same as the respective username.
INSERT INTO users(username, email, password) VALUES ('user0', 'user0@wepet.com', '$2y$10$OhHkzuNzVXRm4iP7ZHPozevWCg.lZ6U6FNwmqm53/Vgy8xoWq.DYS');
INSERT INTO users(username, email, password) VALUES ('user1', 'user1@wepet.com', '$2y$10$yY9lyr4CMlUbicNlaneqveZcpm8VN5WMZ9gf/I1HjffJpRllF9jOe');
INSERT INTO users(username, email, password) VALUES ('user2', 'user2@wepet.com', '$2y$10$ipexGMu1xSPJ4gVvvXqPKe9n6Y5eZ1OVSoP3xor.eXSKs4yhy8EtK');
INSERT INTO users(username, email, password) VALUES ('user3', 'user3@wepet.com', '$2y$10$eqUHSgJZtusJjUEeEjGZ9eVCdv9gWDrukJ/1sRVGrrpHOzIcuFuNC');
INSERT INTO users(username, email, password) VALUES ('user4', 'user4@wepet.com', '$2y$10$EQIHUXa4f7Ppp64WqAKhUOeY2i6VtcZ67Csq/PjHFAK3/GBg26a06');
INSERT INTO users(username, email, password) VALUES ('user5', 'user5@wepet.com', '$2y$10$Js.162YBiA6xBMz0D5Ehleyo9W9C0rAKojieQoYCHKj1t2pvP6PZm');
INSERT INTO users(username, email, password) VALUES ('user6', 'user6@wepet.com', '$2y$10$NlW6CDiEGGDf0MLKIO3J6OapenbV93c7FYzbt1K0W9psOKJg3fJr2');
INSERT INTO users(username, email, password) VALUES ('user7', 'user7@wepet.com', '$2y$10$EWXYyIAlcjkFIW8ZC71.x.jFEPFUQxOXJUxwkQ.rqemBc3l0bppmS');
INSERT INTO users(username, email, password) VALUES ('user8', 'user8@wepet.com', '$2y$10$IctvNVxtM9GbJFrfrR5yeec.Dlc3Q5vuMg52/XeFN2JLsCrGdqJOy');
INSERT INTO users(username, email, password) VALUES ('user9', 'user9@wepet.com', '$2y$10$jzordC8XRFpGDvbsv4mBeeBXzJax6ew76vKC3.bQp1hA9VYELU7A2');
INSERT INTO users(username, email, password) VALUES ('user10', 'user10@wepet.com', '$2y$10$hX4zcPumTqvqRQU3cP1Mk.bK.qwJKdE.z/HF2OzBqecrnqNycxxBC');
INSERT INTO users(username, email, password) VALUES ('user11', 'user11@wepet.com', '$2y$10$9vlNGcnN/Pvlu3mEALVVa.LHFZvs8JESDzVuoL8jjkHqxIl/npg7.');
INSERT INTO users(username, email, password) VALUES ('user12', 'user12@wepet.com', '$2y$10$SImQLVFiEn6Oo2D.WgwyFueaKHnG/SxDiyQqQl4Zgl5esI3PoG9k.');
INSERT INTO users(username, email, password) VALUES ('user13', 'user13@wepet.com', '$2y$10$nfWznizLS68Vz22b.x2CfOAGNZQ4DNc14Qo7BNfM8FsvNywiH8rUS');
INSERT INTO users(username, email, password) VALUES ('user14', 'user14@wepet.com', '$2y$10$HeyYKRKadrdWemn3uIqpe.w.UlUQko/ag.CuGjqXN58jWyg3v3rSq');
INSERT INTO users(username, email, password) VALUES ('user15', 'user15@wepet.com', '$2y$10$4VKydjzogmYqi2rwqxUjxuSGOe73I8WWV5VDWDaMvMkcUnVNsjY86');
INSERT INTO users(username, email, password) VALUES ('user16', 'user16@wepet.com', '$2y$10$ZstBYcVGZgr14H58KfH3xupEadlvq87XvbLzkEl2zRuuYhH0Ps/uC');
INSERT INTO users(username, email, password) VALUES ('user17', 'user17@wepet.com', '$2y$10$U/qMo3uzNgs3fTZcbLRyQeo.8398AxG3hfgPFp/vArdlPj9LlLQxK');
INSERT INTO users(username, email, password) VALUES ('user18', 'user18@wepet.com', '$2y$10$wUPLSZCNDF2wqKfJ.g2YrOPhGkhiqS3xtS5ZRpgPGeppclSPgwU5e');
INSERT INTO users(username, email, password) VALUES ('user19', 'user19@wepet.com', '$2y$10$sH7GBMRx/JJeOgt7v6fmY.82QXmLwRF.fH8DpHRysSUimA/2Fhb7W');

-- Admin user is both owner and taker.
INSERT INTO user_profiles(username, type) VALUES ('test', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('test', 'peter');
-- Sample uses take turns to be owner or taker.
INSERT INTO user_profiles(username, type) VALUES ('user0', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('user1', 'peter');
INSERT INTO user_profiles(username, type) VALUES ('user2', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('user3', 'peter');
INSERT INTO user_profiles(username, type) VALUES ('user4', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('user5', 'peter');
INSERT INTO user_profiles(username, type) VALUES ('user6', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('user7', 'peter');
INSERT INTO user_profiles(username, type) VALUES ('user8', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('user9', 'peter');
INSERT INTO user_profiles(username, type) VALUES ('user10', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('user11', 'peter');
INSERT INTO user_profiles(username, type) VALUES ('user12', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('user13', 'peter');
INSERT INTO user_profiles(username, type) VALUES ('user14', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('user15', 'peter');
INSERT INTO user_profiles(username, type) VALUES ('user16', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('user17', 'peter');
INSERT INTO user_profiles(username, type) VALUES ('user18', 'owner');
INSERT INTO user_profiles(username, type) VALUES ('user19', 'peter');

-- Declare some base types for pet types first.
INSERT INTO pet_types(type, description) VALUES ('Cat', 'A small, typically furry, carnivorous mammal.');
INSERT INTO pet_types(type, description) VALUES ('Dog', 'A member of the genus Canis, which forms part of the wolf-like canids.');
INSERT INTO pet_types(type, description) VALUES ('Bird', 'A group of endothermic vertebrates, characterised by feathers and toothless beaked jaws');
INSERT INTO pet_types(type, description) VALUES ('Fish', 'Gill-bearing aquatic craniate animals that lack limbs with digits');

-- Then declare some derived types.
INSERT INTO pet_types(type, root_type, description) VALUES ('Siamese Cat', 'Cat', 'With stunning blue eyes, it is ranked as the most popular pedigreed cat breed in 2011.');
INSERT INTO pet_types(type, root_type, description) VALUES ('Bull Terrier Dog', 'Dog', 'Unfairly branded as an aggressive animal, the Bull Terrier was actually a companion dog.');
INSERT INTO pet_types(type, root_type, description) VALUES ('Budgies Bird', 'Bird', 'One of the most popular pet bird species, and it comes as no surprise to anyone who has ever known one.');
INSERT INTO pet_types(type, root_type, description) VALUES ('Neon Tetra Fish', 'Fish', 'Although small in size, these beautifully coloured, cool freshwater fish will surely satisfy you.');

-- Generate some fake data for pets.
INSERT INTO pets(username, pet_name, type, bio) VALUES ('test', 'John', 'Bull Terrier Dog', 'A very nice dog');
INSERT INTO pets(username, pet_name, type, bio) VALUES ('test', 'Tommy', 'Cat', 'My pet really loves sleeping');
INSERT INTO pets(username, pet_name, type, bio) VALUES ('user0', 'John', 'Dog', 'He is quite quite.');
INSERT INTO pets(username, pet_name, type, bio) VALUES ('user2', 'Swify', 'Budgies Bird', 'Please give her enough food. Please!');
INSERT INTO pets(username, pet_name, type, bio) VALUES ('user4', 'Molly', 'Cat', 'She needs to sleep at least 8 hours a day.');
INSERT INTO pets(username, pet_name, type, bio) VALUES ('user6', 'Oscar', 'Siamese Cat', 'He is a very active cat.');

-- Generate some fake data for service offers.
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('test', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('test', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('user1', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('user3', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('user5', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('user7', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('user9', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('user1', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('user3', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('user5', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('user7', '2018-06-10', '2018-07-10', '2018-05-08');
INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('user9', '2018-06-10', '2018-07-10', '2018-05-08');

-- Generate some fake data for service targets.
INSERT INTO service_target(service_id, type) VALUES (1, 'Siamese Cat');
INSERT INTO service_target(service_id, type) VALUES (1, 'Cat');
INSERT INTO service_target(service_id, type) VALUES (2, 'Dog');
INSERT INTO service_target(service_id, type) VALUES (2, 'Siamese Cat');
INSERT INTO service_target(service_id, type) VALUES (3, 'Cat');
INSERT INTO service_target(service_id, type) VALUES (3, 'Budgies Bird');
INSERT INTO service_target(service_id, type) VALUES (4, 'Bull Terrier Dog');
INSERT INTO service_target(service_id, type) VALUES (4, 'Budgies Bird');
INSERT INTO service_target(service_id, type) VALUES (5, 'Budgies Bird');
INSERT INTO service_target(service_id, type) VALUES (5, 'Bull Terrier Dog');
INSERT INTO service_target(service_id, type) VALUES (6, 'Budgies Bird');
INSERT INTO service_target(service_id, type) VALUES (6, 'Cat');
INSERT INTO service_target(service_id, type) VALUES (7, 'Dog');
INSERT INTO service_target(service_id, type) VALUES (7, 'Fish');
INSERT INTO service_target(service_id, type) VALUES (8, 'Bull Terrier Dog');
INSERT INTO service_target(service_id, type) VALUES (8, 'Fish');
INSERT INTO service_target(service_id, type) VALUES (9, 'Cat');
INSERT INTO service_target(service_id, type) VALUES (9, 'Dog');
INSERT INTO service_target(service_id, type) VALUES (10, 'Budgies Bird');
INSERT INTO service_target(service_id, type) VALUES (10, 'Fish');
INSERT INTO service_target(service_id, type) VALUES (11, 'Dog');
INSERT INTO service_target(service_id, type) VALUES (11, 'Cat');
INSERT INTO service_target(service_id, type) VALUES (12, 'Cat');
INSERT INTO service_target(service_id, type) VALUES (12, 'Budgies Bird');

-- Generate some fake data for biddings.
INSERT INTO bidding(service_id, bidder, pet_name, points) VALUES(1, 'user6', 'Oscar', 598.7);
INSERT INTO bidding(service_id, bidder, pet_name, points) VALUES(1, 'user0', 'John', 1587.55);
INSERT INTO bidding(service_id, bidder, pet_name, points) VALUES(1, 'user2', 'Swify', 825.4);
INSERT INTO bidding(service_id, bidder, pet_name, points) VALUES(4, 'test', 'John', 189.6);
INSERT INTO bidding(service_id, bidder, pet_name, points) VALUES(8, 'test', 'Tommy', 189.6);
