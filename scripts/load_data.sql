-- Use this user to login and test (admin account). The password is "peterfinder".
INSERT INTO users(username, email, password) VALUES ('test', 'guy@gmail.com', '$2y$10$YxaoA76mPQKIQKH51ibtJOSagQ5kBmalj7RW6j3Zw/Qsxali6bUMC');
-- Below are sample users, whose password is the same as the respective username.
INSERT INTO users(username, email, password) VALUES ('user0', 'user0@wepet.com', '$2y$10$iZA9Jx1nFd8Iw1N.Ds/NSeMcvsyFO375BVO0mqY2.ce/GiqHFctbq');
INSERT INTO users(username, email, password) VALUES ('user1', 'user1@wepet.com', '$2y$10$xLzbgbgXKy7d5h0msyb0fug52Z6BqmGL63iho249KQeLiUWNERA.2');
INSERT INTO users(username, email, password) VALUES ('user2', 'user2@wepet.com', '$2y$10$AA7IRLfQ5.vdHMlqlzoaueqCb6Zo531MHgmdGr4kVlZmGbxs8jVfS');
INSERT INTO users(username, email, password) VALUES ('user3', 'user3@wepet.com', '$2y$10$R0fGETTBxejN60.U19NJteV7k/M/v8iJI75TUt8ExomC2bF5jmmDO');
INSERT INTO users(username, email, password) VALUES ('user4', 'user4@wepet.com', '$2y$10$tVmx5mJQP3AenYQOHgjfwOfnECrMknKQHMrahAZg0pfEjjh2Hp8x6');
INSERT INTO users(username, email, password) VALUES ('user5', 'user5@wepet.com', '$2y$10$CLUzUsiltjWid8oW2aWmYO6hDCZnsTwy5VGmjdKfaSYJnqPPxkCUa');
INSERT INTO users(username, email, password) VALUES ('user6', 'user6@wepet.com', '$2y$10$t66FAhL6MLc/oSeZIL/80Ochzwn3XWlIuzouLmE.0wuzcu/a87dAW');
INSERT INTO users(username, email, password) VALUES ('user7', 'user7@wepet.com', '$2y$10$LbRGTH8we03TsXg2K8a8j.LfJXxq5A7pMry23l.Gxn7NRAOHwqj96');
INSERT INTO users(username, email, password) VALUES ('user8', 'user8@wepet.com', '$2y$10$nGLn6BF4e8lS.1fe..ZUmO.BCJRgleGO.RaNthcErEBvDS3/79q0G');
INSERT INTO users(username, email, password) VALUES ('user9', 'user9@wepet.com', '$2y$10$MKC7Xq0K65bCQ4DeFg1is.UGv6oCZAclw81Q/qjwtPpAW/jZ16QrC');
INSERT INTO users(username, email, password) VALUES ('user10', 'user10@wepet.com', '$2y$10$tEcL97yV05t03YY5psVIo.GEaPFr93S8JnS6iY7FJ/FeVw0ecfxjy');
INSERT INTO users(username, email, password) VALUES ('user11', 'user11@wepet.com', '$2y$10$K5A4m63vazjWZGi3FPu.VeVxgVVhX.42LJKVzxSQHsnLiJ65rPC8i');
INSERT INTO users(username, email, password) VALUES ('user12', 'user12@wepet.com', '$2y$10$xUyuY4J.pei2tm87Fwxj9OPgP01Mfhj3u40N/TPd0BsD/uz3WtFJy');
INSERT INTO users(username, email, password) VALUES ('user13', 'user13@wepet.com', '$2y$10$pM1TrrPiiy/u97m4UEPIBOHKX.rt6Ik/lt/tn/VpmQ5v8nW14kwrG');
INSERT INTO users(username, email, password) VALUES ('user14', 'user14@wepet.com', '$2y$10$093emZ2oikHChutDSrKyhOmyQM4BcgNnadN9OxkdQB2qa0yxcpXRW');
INSERT INTO users(username, email, password) VALUES ('user15', 'user15@wepet.com', '$2y$10$h/aocsd9lpskE9VEv2UtqeLXDu3a7fhc4GElaRgDQr8f/2YLSOU.G');
INSERT INTO users(username, email, password) VALUES ('user16', 'user16@wepet.com', '$2y$10$pgFCDRyiKp9uYLbb79j5e.rUZEB9n5rFIKgBnHOGVDsj0xzRGByzO');
INSERT INTO users(username, email, password) VALUES ('user17', 'user17@wepet.com', '$2y$10$vf7BUZYIERL1LSKOqLcRV.wjOztSLHoYCNVe.6Fr4lbbJodbunII.');
INSERT INTO users(username, email, password) VALUES ('user18', 'user18@wepet.com', '$2y$10$ViAKMplLTvsgXR3cK8tfL.0mymYTpef4PsaWfr5u4TXwHPkVJDaQG');
INSERT INTO users(username, email, password) VALUES ('user19', 'user19@wepet.com', '$2y$10$M8mC.SDuAUCQ/SUQbi1JQO15C.kJnIjcJksmzc1NEO.t7Umx3lrWy');

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
