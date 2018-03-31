-- Use this user to login and test (admin account). The password is "peterfinder".
INSERT INTO users(username, email, password) VALUES ('test', 'guy@gmail.com', '$2y$10$DAI/0y8Cwp9wuoJnQYZJiuJRJc1ndj1a9MWsDNfSiMh5irDp9DE5y');
-- Below are sample users, whose password is the same as the respective username.
INSERT INTO users(username, email, password) VALUES ('user0', 'user0@wepet.com', '$2y$10$5GsggKZ/qv6MpHu2e.HgY.iUB08GGYVKx86MPUicG9XJHvNe6qtGi');
INSERT INTO users(username, email, password) VALUES ('user1', 'user1@wepet.com', '$2y$10$qNtXjcwJhrEJdjcH4yH4IubJp7pdSTCVvZeXDVBaqqnXmk./gEeRy');
INSERT INTO users(username, email, password) VALUES ('user2', 'user2@wepet.com', '$2y$10$wv8QBaUf74UWR04SqfWGfOtMM20BrlcWUKldonkmacz/.TC8/XD.C');
INSERT INTO users(username, email, password) VALUES ('user3', 'user3@wepet.com', '$2y$10$4b.1snBSRQv56.OMGKq9Uuuj5zWQsOgVxcbIEQw28lDAMbhzWOC86');
INSERT INTO users(username, email, password) VALUES ('user4', 'user4@wepet.com', '$2y$10$uOVE4AUBVMGYB1758H/alOLxNpC8zLpxB84tQ934dy/NSj1mCD2s.');
INSERT INTO users(username, email, password) VALUES ('user5', 'user5@wepet.com', '$2y$10$R3yA7I1QpLvWe0DhK8FgXOQqeQZWgAAMOsfW3n5LIxwu75/sBU8DW');
INSERT INTO users(username, email, password) VALUES ('user6', 'user6@wepet.com', '$2y$10$wCnoEKWikke4IVIZpvR/puA9Jf6Fs161UhcrZrxa/iC/DGqMHYlbK');
INSERT INTO users(username, email, password) VALUES ('user7', 'user7@wepet.com', '$2y$10$khf8TsvJMnbm13i43sX3oeMOtXvxiiBQlvL8Oe4W8WOH3ZZLFaR26');
INSERT INTO users(username, email, password) VALUES ('user8', 'user8@wepet.com', '$2y$10$ToeAktmC2uhOdtTtEGoPoeGxsa/1SspEzoisMMJqh8ml2Lm9MDueu');
INSERT INTO users(username, email, password) VALUES ('user9', 'user9@wepet.com', '$2y$10$SPtMnSS4M9n6qKoIN16uEukQ.GTbstgTh72S3d1ILAOPogGIXCGqm');
INSERT INTO users(username, email, password) VALUES ('user10', 'user10@wepet.com', '$2y$10$JRedv4bBtoIvGwxYJYAvp.rY9.RIF92/J2MJ53ukAlXp3b71bdyrG');
INSERT INTO users(username, email, password) VALUES ('user11', 'user11@wepet.com', '$2y$10$1kF7dp/JOqpDQME2C5eeYujoUI56mfCHDo4m1V3DBbWQQtFPQhedG');
INSERT INTO users(username, email, password) VALUES ('user12', 'user12@wepet.com', '$2y$10$sFpphG6Z7Ly3BkykB2GqOeit6hJLv90zJqJHGGpaE.zId4/qcSvz2');
INSERT INTO users(username, email, password) VALUES ('user13', 'user13@wepet.com', '$2y$10$eEsWJzXx/M0HeJ6dfzWtyOuCsOthDl/50hAbq7JVasxZPe6MTi/4O');
INSERT INTO users(username, email, password) VALUES ('user14', 'user14@wepet.com', '$2y$10$4oDFdz2.k4O7JD6rs1RKkeQbjKTAv0Bvnf.chN42V5NVmIElM6N8C');
INSERT INTO users(username, email, password) VALUES ('user15', 'user15@wepet.com', '$2y$10$By6Pwnmtb/ryHzKd.Px8ROIXUzZYVcgv94Cc/hcW8zIExx7ObjmgK');
INSERT INTO users(username, email, password) VALUES ('user16', 'user16@wepet.com', '$2y$10$7Rw0Gf5L6G8EF76.ISvgQ./bvzAbb.0vq3bs1FR1sBgyjKW1Nv3GC');
INSERT INTO users(username, email, password) VALUES ('user17', 'user17@wepet.com', '$2y$10$N/VYoFdPf0B6Gwv5k1eSF.rKGmyy7x8eR.a7yFlhqDpE3OUdNS.pK');
INSERT INTO users(username, email, password) VALUES ('user18', 'user18@wepet.com', '$2y$10$iXFMlt6EfG6vFGkztbMek.O/B9Y6rHbFth5sUUx/KZy2tEnAIoc0W');
INSERT INTO users(username, email, password) VALUES ('user19', 'user19@wepet.com', '$2y$10$fOpnX8iTV8pyC0ONAc2UzuY60rXZnArFb8YkdWah4vUkaKqD4fMpS');

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

INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
VALUES('user1','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
VALUES('user2','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
VALUES('user3','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
VALUES('user4','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
VALUES('user5','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
VALUES('user6','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
VALUES('user7','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
VALUES('user8','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
VALUES('user9','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
VALUES('user10','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
