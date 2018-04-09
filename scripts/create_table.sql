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
  bio varchar(511),
  is_admin boolean NOT NULL DEFAULT false,
  is_active boolean NOT NULL DEFAULT true,
  created_at timestamp DEFAULT current_timestamp,
  updated_at timestamp DEFAULT current_timestamp
);

CREATE TABLE user_profiles (
  username varchar(255) REFERENCES users(username),
  type user_type NOT NULL,
  score numeric DEFAULT 0,
  created_at timestamp DEFAULT current_timestamp,
  updated_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (username, type)
);

CREATE TABLE pet_types (
  type varchar(255) PRIMARY KEY,
  root_type varchar(255) REFERENCES pet_types(type),
  description varchar(255),
  created_at timestamp DEFAULT current_timestamp,
  updated_at timestamp DEFAULT current_timestamp
);

CREATE TABLE pets (
  username varchar(255) REFERENCES users(username),
  pet_name varchar(255) NOT NULL,
  gender gender_type NOT NULL DEFAULT 'unknown',
  type varchar(255) REFERENCES pet_types(type) NOT NULL,
  avatar varchar(255),
  birthday date,
  bio varchar(511),
  created_at timestamp DEFAULT current_timestamp,
  updated_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (username, pet_name)
);

CREATE TABLE service_offers (
  service_id SERIAL PRIMARY KEY,
  provider varchar(255) REFERENCES users(username),
  start_date date,
  end_date date,
  decision_deadline timestamp,
  expected_salary int NOT NULL DEFAULT 100,
  created_at timestamp DEFAULT current_timestamp,
  updated_at timestamp DEFAULT current_timestamp,
  CONSTRAINT "Decision deadline must be in the future." CHECK (decision_deadline > updated_at),
  CONSTRAINT "Service start time must be after decision deadline." CHECK (start_date > decision_deadline),
  CONSTRAINT "Service end time must be after start time." CHECK (end_date > start_date)
);

CREATE TABLE service_target (
  service_id int REFERENCES service_offers(service_id),
  type varchar(255) REFERENCES pet_types(type),
  created_at timestamp DEFAULT current_timestamp,
  updated_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (service_id, type)
);

CREATE TABLE bidding (
  service_id int REFERENCES service_offers(service_id),
  bidder varchar(255) REFERENCES users(username),
  points int DEFAULT 0,
  status bidding_status DEFAULT 'pending',
  created_at timestamp DEFAULT current_timestamp,
  updated_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (bidder, service_id)
);

CREATE TABLE service_history (
  service_id int PRIMARY KEY,
  owner varchar(255) NOT NULL,
  rating_for_owner integer,
  review_for_owner varchar(511),
  rating_for_taker integer,
  review_for_taker varchar(511),
  created_at timestamp DEFAULT current_timestamp,
  updated_at timestamp DEFAULT current_timestamp,
  FOREIGN KEY (service_id, owner) REFERENCES bidding(service_id, bidder),
  CONSTRAINT "Rating for pet owner is not valid." CHECK (rating_for_owner > 0 AND rating_for_owner <= 5),
  CONSTRAINT "Rating for care taker is not valid." CHECK (rating_for_taker > 0 AND rating_for_taker <= 5)
);

CREATE TABLE notification (
  username varchar(255) REFERENCES users(username),
  message varchar(511),
  status notification_status DEFAULT 'unread',
  created_at timestamp DEFAULT current_timestamp,
  updated_at timestamp DEFAULT current_timestamp
);
