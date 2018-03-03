DROP SCHEMA public CASCADE;
CREATE SCHEMA public;

CREATE SEQUENCE service_id_seq INCREMENT 1 MINVALUE 0 START WITH 0 NO CYCLE CACHE 10;

CREATE TABLE users (
    username varchar(255) PRIMARY KEY,
    email varchar(255) UNIQUE NOT NULL,
    password varchar(255) NOT NULL,
    avatar varchar(255) DEFAULT 'Have not implemented',
    last_name varchar(255),
    first_name varchar(255),
    gender char(1) NOT NULL DEFAULT 'u',
    telephone varchar(15) NOT NULL DEFAULT '84090920',
    -- location int REFERENCES regions(username),
    bio varchar(511) DEFAULT '-',
    is_admin boolean NOT NULL DEFAULT false,
    is_active boolean NOT NULL DEFAULT true
    created_by varchar(255) REFERENCES username,
    created_at timestamp DEFAULT current_timestamp,
    updated_by varchar(255) REFERENCES username,
    updated_at timestamp DEFAULT current_timestamp
);

CREATE TABLE user_profiles(
    username varchar(255) REFERENCES users(username),
    type char(1) DEFAULT 'b',
    score numeric DEFAULT 0,
    created_by varchar(255) REFERENCES users(username),
    created_at timestamp DEFAULT current_timestamp,
    updated_by varchar(255) REFERENCES users(username),
    updated_at timestamp DEFAULT current_timestamp,
    PRIMARY KEY (username, type)
);

CREATE TABLE pet_types (
    type varchar(255) PRIMARY KEY,
    root_type varchar(255),
    description varchar(255),
    created_by varchar(255) REFERENCES users(username),
    created_at timestamp DEFAULT current_timestamp,
    updated_by varchar(255) REFERENCES users(username),
    updated_at timestamp DEFAULT current_timestamp
);

CREATE TABLE pets (
    username varchar(255) REFERENCES users(username),
    petname varchar(255) NOT NULL,
    gender char(1) NOT NULL DEFAULT 'u',
    type varchar(255) REFERENCES pet_types(type),
    avatar varchar(255) DEFAULT 'Have not implemented',
    birthday timestamp,
    bio varchar(511) NOT NULL DEFAULT '-',
    created_by varchar(255) REFERENCES users(username),
    created_at timestamp DEFAULT current_timestamp,
    updated_by varchar(255) REFERENCES users(username),
    updated_at timestamp DEFAULT current_timestamp,
    PRIMARY KEY (username, petname)
);

CREATE TABLE service_offers (
    service_id int PRIMARY KEY DEFAULT nextval('service_id_seq'),
    provider varchar(255) REFERENCES users(username),
    start_time timestamp,
    end_time timestamp,
    post_time timestamp NOT NULL DEFAULT current_timestamp,
    decision_deadline timestamp,
    expected_salary int NOT NULL DEFAULT 100,
    CONSTRAINT decision_deadline CHECK (decision_deadline > post_time),
    CONSTRAINT start_time CHECK (start_time > decision_deadline),
    CONSTRAINT end_time CHECK (end_time > start_time),
    created_by varchar(255) REFERENCES users(username),
    created_at timestamp DEFAULT current_timestamp,
    updated_by varchar(255) REFERENCES users(username),
    updated_at timestamp DEFAULT current_timestamp
);

CREATE TABLE service_history (
	service_id int PRIMARY KEY REFERENCES service_offers(service_id),
	owner varchar(255),
	taker varchar(255),
	rating_for_owner integer,
	review_for_owner varchar(511),
	rating_for_taker integer,
	review_for_taker varchar(511),
	created_by varchar(255) REFERENCES users(username),
    created_at timestamp DEFAULT current_timestamp,
    updated_by varchar(255) REFERENCES users(username),
    updated_at timestamp DEFAULT current_timestamp
);

CREATE TABLE service_target (
	service_id int REFERENCES service_offers(service_id),
	type int REFERENCES pet_types(type),
	created_by varchar(255) REFERENCES users(username),
    created_at timestamp DEFAULT current_timestamp,
    updated_by varchar(255) REFERENCES users(username),
    updated_at timestamp DEFAULT current_timestamp,
    PRIMARY KEY (service_id, type)
);

CREATE TABLE notification (
	username varchar(255) REFERENCES users(username),
	message varchar(511),
	status integer DEFAULT 0, # 0:unread, 1:read
	created_by varchar(255) REFERENCES users(username),
    created_at timestamp DEFAULT current_timestamp,
);

CREATE TABLE bidding (
	username varchar(255) REFERENCES users(username),
	service_id int REFERENCES service_offers(service_id),
	points int DEFAULT 0,
	status int DEFAULT 0, # 0:pending, 1:succeed, 2:fail, 3:cancel
	created_by varchar(255) REFERENCES users(username),
    created_at timestamp DEFAULT current_timestamp,
    updated_by varchar(255) REFERENCES users(username),
    updated_at timestamp DEFAULT current_timestamp
	PRIMARY KEY (username, service_id)
);

INSERT INTO users(username,email,password) VALUES ('user1','user1@wepet.com','user1');
INSERT INTO users(username,email,password) VALUES ('user2','user2@wepet.com','user2');
INSERT INTO users(username,email,password) VALUES ('user3','user3@wepet.com','user3');
INSERT INTO users(username,email,password) VALUES ('user4','user4@wepet.com','user4');
INSERT INTO users(username,email,password) VALUES ('user5','user5@wepet.com','user5');
INSERT INTO users(username,email,password) VALUES ('user6','user6@wepet.com','user6');
INSERT INTO users(username,email,password) VALUES ('user7','user7@wepet.com','user7');
INSERT INTO users(username,email,password) VALUES ('user8','user8@wepet.com','user8');
INSERT INTO users(username,email,password) VALUES ('user9','user9@wepet.com','user9');
INSERT INTO users(username,email,password) VALUES ('user10','user10@wepet.com','user10');
INSERT INTO users(username,email,password) VALUES ('user11','user11@wepet.com','user11');
INSERT INTO users(username,email,password) VALUES ('user12','user12@wepet.com','user12');
INSERT INTO users(username,email,password) VALUES ('user13','user13@wepet.com','user13');
INSERT INTO users(username,email,password) VALUES ('user14','user14@wepet.com','user14');
INSERT INTO users(username,email,password) VALUES ('user15','user15@wepet.com','user15');
INSERT INTO users(username,email,password) VALUES ('user16','user16@wepet.com','user16');
INSERT INTO users(username,email,password) VALUES ('user17','user17@wepet.com','user17');
INSERT INTO users(username,email,password) VALUES ('user18','user18@wepet.com','user18');
INSERT INTO users(username,email,password) VALUES ('user19','user19@wepet.com','user19');
INSERT INTO users(username,email,password) VALUES ('user20','user20@wepet.com','user20');

INSERT INTO service_offers(provider,start_time,end_time,decision_deadline)
 VALUES('user1','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_time,end_time,decision_deadline)
 VALUES('user2','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_time,end_time,decision_deadline)
 VALUES('user3','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_time,end_time,decision_deadline)
 VALUES('user4','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_time,end_time,decision_deadline)
 VALUES('user5','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_time,end_time,decision_deadline)
 VALUES('user6','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_time,end_time,decision_deadline)
 VALUES('user7','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_time,end_time,decision_deadline)
 VALUES('user8','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_time,end_time,decision_deadline)
 VALUES('user9','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
INSERT INTO service_offers(provider,start_time,end_time,decision_deadline)
 VALUES('user10','2018-03-21 08:05:00','2018-03-25 20:55:00','2018-03-20 23:59:59');
