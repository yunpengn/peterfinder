DROP DATABASE peterfinder;
CREATE DATABASE peterfinder;

CREATE TYPE user_type AS ENUM (
  'owner',
  'peter');

CREATE TYPE gender_type AS ENUM (
  'male',
  'female',
  'unknown');

CREATE TYPE notification_status AS ENUM (
  'unread',
  'read');

CREATE TYPE bidding_status AS ENUM (
  'pending',
  'succeed',
  'fail',
  'cancel');

CREATE TABLE users (
  username varchar(255) PRIMARY KEY,
  email varchar(255) UNIQUE NOT NULL,
  password varchar(255) NOT NULL,
  avatar varchar(255),
  last_name varchar(255),
  first_name varchar(255),
  gender gender_type NOT NULL DEFAULT 'unknown',
  telephone varchar(15),
  -- location int REFERENCES regions(username),
  bio varchar(511),
  is_admin boolean NOT NULL DEFAULT false,
  is_active boolean NOT NULL DEFAULT true,
  created_by varchar(255) REFERENCES users(username),
  created_at timestamp DEFAULT current_timestamp,
  updated_by varchar(255) REFERENCES users(username),
  updated_at timestamp DEFAULT current_timestamp
);

CREATE TABLE user_profiles (
  username varchar(255) REFERENCES users(username),
  type user_type NOT NULL,
  score numeric DEFAULT 0,
  created_by varchar(255) REFERENCES users(username),
  created_at timestamp DEFAULT current_timestamp,
  updated_by varchar(255) REFERENCES users(username),
  updated_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (username, type)
);

CREATE TABLE pet_types (
  type varchar(255) PRIMARY KEY,
  root_type varchar(255) REFERENCES pet_types(type),
  description varchar(255),
  created_by varchar(255) REFERENCES users(username),
  created_at timestamp DEFAULT current_timestamp,
  updated_by varchar(255) REFERENCES users(username),
  updated_at timestamp DEFAULT current_timestamp
);

CREATE TABLE pets (
  username varchar(255) REFERENCES users(username),
  petname varchar(255) NOT NULL,
  gender gender_type NOT NULL DEFAULT 'unknown',
  type varchar(255) REFERENCES pet_types(type),
  avatar varchar(255),
  birthday date,
  bio varchar(511),
  created_by varchar(255) REFERENCES users(username),
  created_at timestamp DEFAULT current_timestamp,
  updated_by varchar(255) REFERENCES users(username),
  updated_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (username, petname)
);

CREATE TABLE service_offers (
  service_id SERIAL PRIMARY KEY,
  provider varchar(255) REFERENCES users(username),
  start_date date,
  end_date date,
  decision_deadline timestamp,
  expected_salary int NOT NULL DEFAULT 100,
  created_by varchar(255) REFERENCES users(username),
  created_at timestamp DEFAULT current_timestamp,
  updated_by varchar(255) REFERENCES users(username),
  updated_at timestamp DEFAULT current_timestamp
  CONSTRAINT decision_deadline CHECK (decision_deadline > updated_at),
  CONSTRAINT start_time CHECK (start_date > decision_deadline),
  CONSTRAINT end_time CHECK (end_date > start_date)
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
  status notification_status DEFAULT 'unread',
  created_by varchar(255) REFERENCES users(username),
  created_at timestamp DEFAULT current_timestamp,
  updated_by varchar(255) REFERENCES users(username),
  updated_at timestamp DEFAULT current_timestamp
);

CREATE TABLE bidding (
  bidder varchar(255) REFERENCES users(username),
  service_id int REFERENCES service_offers(service_id),
  points int DEFAULT 0,
  status bidding_status DEFAULT 'pending',
  created_by varchar(255) REFERENCES users(username),
  created_at timestamp DEFAULT current_timestamp,
  updated_by varchar(255) REFERENCES users(username),
  updated_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (bidder, service_id)
);
