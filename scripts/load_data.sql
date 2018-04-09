-- Use this user to login and test (admin account). The password is "peterfinder".
INSERT INTO users(username, email, password) VALUES ('test', 'guy@gmail.com', '$2y$10$XZMULmMbEbxLH5VA/3bSuOLmT9C1dknAT6lfT4HjETT8SJhWGFB82');
-- Below are sample users, whose password is the same as the respective username.
INSERT INTO users(username, email, password) VALUES ('user0', 'user0@wepet.com', '$2y$10$8lYXZTJixmIjuyOQXmZaSufXCLbj1sa7oPRbHsXy9hLXZzdgSAuL.');
INSERT INTO users(username, email, password) VALUES ('user1', 'user1@wepet.com', '$2y$10$PJnn75Qr5Irqaxu4zhhKF./iDjVd5Bhu1Sg/8M8RFda6dCzBMaCwm');
INSERT INTO users(username, email, password) VALUES ('user2', 'user2@wepet.com', '$2y$10$UZEeY4kGSDMwn9raxTPgze.dqORfZHFQTGw34PDZzgJbwcMobfNOW');
INSERT INTO users(username, email, password) VALUES ('user3', 'user3@wepet.com', '$2y$10$GI00k0sufHehdIJcUZXvF.3.Cgw2CrQXZwwjnWCcnSjDJx8OAVNVq');
INSERT INTO users(username, email, password) VALUES ('user4', 'user4@wepet.com', '$2y$10$Xu2LhqzuCU0KyB0yXNdJ9um8TeBdoFgc2nIm8h6Ru7LyVybSGI8qa');
INSERT INTO users(username, email, password) VALUES ('user5', 'user5@wepet.com', '$2y$10$YNt/DJgOk9s38yXSLvCMTeqGElLsUjdkVhQC7QDcuDcW7aZiIqmYy');
INSERT INTO users(username, email, password) VALUES ('user6', 'user6@wepet.com', '$2y$10$ASmS9kBzfsC.WeadUlyvlOZ3NHSAkhPbFRdPgeUIO5pgrsUPqmaSu');
INSERT INTO users(username, email, password) VALUES ('user7', 'user7@wepet.com', '$2y$10$dm7..pWJZm.hrDw5DQH7auJfPdZiFqwiYDRI6hJIoWDkoF2rlTKu2');
INSERT INTO users(username, email, password) VALUES ('user8', 'user8@wepet.com', '$2y$10$z3suPZ.9noOQ8/cHUX6a3uoqSm9Gg33yE1uBhY3AglgtEeHXwkZme');
INSERT INTO users(username, email, password) VALUES ('user9', 'user9@wepet.com', '$2y$10$kSqWs72PrNcS5.s18v4YSea7jAlHM/1q5LUXSFbbUn6jSXJDq2i3a');
INSERT INTO users(username, email, password) VALUES ('user10', 'user10@wepet.com', '$2y$10$biQHigDVV/5RC1473aZxxuj9I6JcQuh8moffHJ2hbiNs/sSH53Gce');
INSERT INTO users(username, email, password) VALUES ('user11', 'user11@wepet.com', '$2y$10$XDWVXzaLM5HNj9OCotrcceJW/wZHY.YwQbUaTmJCnC8nJvUQLoX2S');
INSERT INTO users(username, email, password) VALUES ('user12', 'user12@wepet.com', '$2y$10$3Wa2yXIq/wXtD.fLYg0P.e.QfBhAyOymrFVTel7rIu9FnDEBC5K5K');
INSERT INTO users(username, email, password) VALUES ('user13', 'user13@wepet.com', '$2y$10$VSJ6JIUYPF/isBtyeRyCcOBOap463aOOQjSxDIYUpOM89I3dLJeJq');
INSERT INTO users(username, email, password) VALUES ('user14', 'user14@wepet.com', '$2y$10$7hL9w2Z78RqLIbjNqG.7Be6x1lSpuFFTizEjgqFyPIypGGHqlvYKK');
INSERT INTO users(username, email, password) VALUES ('user15', 'user15@wepet.com', '$2y$10$K60WVCE5emhCqCJiN1zD3uhlzf2mr62UhMVYATweQLUMVpiGdmvPy');
INSERT INTO users(username, email, password) VALUES ('user16', 'user16@wepet.com', '$2y$10$JHo/3ca6gtkGT7aC4BBO1e3HLi/LBKTMrat3QXS09v0lbFXGWpb5y');
INSERT INTO users(username, email, password) VALUES ('user17', 'user17@wepet.com', '$2y$10$rCES1/CYpZqUlTCr4codQeJIa943dzxzQmyqao38dgSBYxeLNqthm');
INSERT INTO users(username, email, password) VALUES ('user18', 'user18@wepet.com', '$2y$10$dOQZyRhuFb9a5yWLnYEoHuK6yNlhTnqZDyQga145SSCKRJffT.lyq');
INSERT INTO users(username, email, password) VALUES ('user19', 'user19@wepet.com', '$2y$10$UblxWWjvWHXHr8ZrAeiIROyTZQsmMX8ZlADV2xkJxSXMdLI2WoegG');

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

-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('user1','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('user2','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('user3','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('user4','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('user5','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('user6','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('user7','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('user8','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('user9','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('user10','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('test','2018-04-21 08:05:00','2018-04-25 20:55:00','2018-04-20 23:59:59');
-- INSERT INTO service_offers(provider,start_date,end_date,decision_deadline)
-- VALUES('test','2018-04-26 08:05:00','2018-04-30 20:55:00','2018-04-21 23:59:59');
