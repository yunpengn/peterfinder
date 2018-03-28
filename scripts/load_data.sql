-- Use this user to login and test (admin account). The password is "peterfinder".
INSERT INTO users(username,email,password) VALUES ('test','guy@gmail.com','$2y$10$iyC9VyvuqjA11/WLKtQkreLLBJBdj83aXJsZHv.z6WYVMU8lSSlFS');
-- Below are sample users, whose password is the same as the respective username.
INSERT INTO users(username, email, password) VALUES ('user0', 'user0@wepet.com', '$2y$10$Vx4u.UhP0JMiJorWNlGUveLemkW8jvOY.Z/4lF0G.LIpE.3LNAOgi');
INSERT INTO users(username, email, password) VALUES ('user1', 'user1@wepet.com', '$2y$10$.bYEPtZspfzjYa7oJVSlYu/nVdQyMLEkCNQwTI01P919eDaF./.bm');
INSERT INTO users(username, email, password) VALUES ('user2', 'user2@wepet.com', '$2y$10$2qcD64iwaq5UL/MSdGDkauNU41EDP2GlEfhnYN1YfsOrd6IsKs3.O');
INSERT INTO users(username, email, password) VALUES ('user3', 'user3@wepet.com', '$2y$10$yg0R6UijJ//F9yEo/WMa7eA/xGwK07IrkaG.fzPbPK.JbPthqCkbC');
INSERT INTO users(username, email, password) VALUES ('user4', 'user4@wepet.com', '$2y$10$SVydTQ7oziXWA23zTvhdGOrk3nGb.hLqOftK9j7Od9wYf5JEn7mzC');
INSERT INTO users(username, email, password) VALUES ('user5', 'user5@wepet.com', '$2y$10$wuI3ikVTB1sjwYqRT/pJues7anPl1Vqf0UAuTdznjoOX.B/HNLdVu');
INSERT INTO users(username, email, password) VALUES ('user6', 'user6@wepet.com', '$2y$10$UmOL5OKyYlvMoXQaq3XzGOP4dV/K/Tob9MNNILtXqrbfkQ5f2wGIy');
INSERT INTO users(username, email, password) VALUES ('user7', 'user7@wepet.com', '$2y$10$faJf0AwwmcL4MvgPZ9HYbuMnOELpWiIoxsWquPvwUEVXlZRJih7Nm');
INSERT INTO users(username, email, password) VALUES ('user8', 'user8@wepet.com', '$2y$10$jjLNsPXqpL0NkNelBM9nju/J3/GHNKdZ2e4x4QxaLEDH14v7FHbV2');
INSERT INTO users(username, email, password) VALUES ('user9', 'user9@wepet.com', '$2y$10$/LjFduNDKtuFrcVxk/X6UezKhh.KO0OGP3DV4gZ5n5LWZ7.Hiodaa');
INSERT INTO users(username, email, password) VALUES ('user10', 'user10@wepet.com', '$2y$10$xCId.RRiotzic5BtfSn3a.XTWh1uwg0J4CF5McwdbGi5raqPwij0W');
INSERT INTO users(username, email, password) VALUES ('user11', 'user11@wepet.com', '$2y$10$w8N9e4Z4InkWtmWZn0jyZecs5BfYc39wGK8PER7N/.IMUSNSN/8KC');
INSERT INTO users(username, email, password) VALUES ('user12', 'user12@wepet.com', '$2y$10$Ew3quXwTWLFwrLCBsjKim.kFfLVcnuYnGOddmDjpi6JtEdZI.HCkO');
INSERT INTO users(username, email, password) VALUES ('user13', 'user13@wepet.com', '$2y$10$LghEUk2GS8RUXNb16pASRelJYVXTvl9Sv2cjUKcg58e/wA6AUMkTa');
INSERT INTO users(username, email, password) VALUES ('user14', 'user14@wepet.com', '$2y$10$537x2v./paqptzUQf1QDoukNndcZpBFsaASUGi3Z.QJWUK.Q43Aa2');
INSERT INTO users(username, email, password) VALUES ('user15', 'user15@wepet.com', '$2y$10$qjtstlvU3Wt.RHmAm7M/eOkP/3F8O0R/YHbUNyrWVVG2WIRVzqaXG');
INSERT INTO users(username, email, password) VALUES ('user16', 'user16@wepet.com', '$2y$10$F5AdF9eY9OYgzMylXaAHB.5xeEcU76eCJp8j8XU/yvNtbC8S1Aboy');
INSERT INTO users(username, email, password) VALUES ('user17', 'user17@wepet.com', '$2y$10$PL8yRxWvlMVM/NHidC2.YOiq6U0baqGp2SbvAJcIczh4uBuirmDMy');
INSERT INTO users(username, email, password) VALUES ('user18', 'user18@wepet.com', '$2y$10$GQx9zWJoNqa.WENmcfAS0uFTuY3v.r/smQ8aiwAqXIRSqlOL0hq0K');
INSERT INTO users(username, email, password) VALUES ('user19', 'user19@wepet.com', '$2y$10$1/ZqdkPq.oofbjxQBJIX/exTrwYx1/Lp7sNJ3hkYbUzvpnEfXWeSa');

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
