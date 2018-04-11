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
  'fail');

CREATE TABLE users (
  username varchar(255) PRIMARY KEY,
  email varchar(255) UNIQUE NOT NULL,
  password varchar(255) NOT NULL,
  avatar varchar(255),
  last_name varchar(255),
  first_name varchar(255),
  gender gender_type NOT NULL DEFAULT 'unknown',
  birthday date,
  telephone varchar(15),
  bio varchar(511),
  is_admin boolean NOT NULL DEFAULT false,
  is_active boolean NOT NULL DEFAULT true,
  created_at timestamp DEFAULT current_timestamp,
  CONSTRAINT "Birthday must not be in the future." CHECK (birthday <= NOW())
);

CREATE TABLE user_profiles (
  username varchar(255) REFERENCES users(username),
  type user_type NOT NULL,
  score numeric DEFAULT 0,
  created_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (username, type)
);

CREATE TABLE pet_types (
  type varchar(255) PRIMARY KEY,
  root_type varchar(255) REFERENCES pet_types(type) ON DELETE SET NULL ON UPDATE CASCADE,
  description varchar(255),
  created_at timestamp DEFAULT current_timestamp
);

CREATE TABLE pets (
  username varchar(255) REFERENCES users(username),
  pet_name varchar(255) NOT NULL,
  gender gender_type NOT NULL DEFAULT 'unknown',
  type varchar(255) REFERENCES pet_types(type) ON UPDATE CASCADE NOT NULL,
  avatar varchar(255),
  birthday date,
  bio varchar(511),
  created_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (username, pet_name),
  CONSTRAINT "Birthday must not be in the future." CHECK (birthday <= NOW())
);

CREATE TABLE service_offers (
  service_id SERIAL PRIMARY KEY,
  provider varchar(255) REFERENCES users(username) ON DELETE CASCADE ON UPDATE CASCADE,
  start_date date NOT NULL,
  end_date date NOT NULL,
  decision_deadline timestamp NOT NULL,
  expected_salary numeric NOT NULL DEFAULT 100,
  created_at timestamp DEFAULT current_timestamp,
  CONSTRAINT "Decision deadline must be in the future." CHECK (decision_deadline > updated_at),
  CONSTRAINT "Service start time must be after decision deadline." CHECK (start_date > decision_deadline),
  CONSTRAINT "Service end time must be after start time." CHECK (end_date > start_date),
  CONSTRAINT "Expected salary must be positive." CHECK (expected_salary > 0)
);

CREATE TABLE service_target (
  service_id int REFERENCES service_offers(service_id) ON DELETE CASCADE ON UPDATE CASCADE,
  type varchar(255) REFERENCES pet_types(type) ON DELETE CASCADE ON UPDATE CASCADE,
  created_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (service_id, type)
);

CREATE TABLE bidding (
  service_id int REFERENCES service_offers(service_id) ON DELETE CASCADE ON UPDATE CASCADE,
  bidder varchar(255),
  pet_name varchar(255),
  points numeric DEFAULT 0,
  status bidding_status DEFAULT 'pending',
  created_at timestamp DEFAULT current_timestamp,
  PRIMARY KEY (service_id, bidder, pet_name),
  FOREIGN KEY (bidder, pet_name) REFERENCES pets(username, pet_name) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT "Bidding points must be positive." CHECK (points > 0)
);

CREATE TABLE service_history (
  service_id int PRIMARY KEY,
  owner varchar(255) NOT NULL,
  pet_name varchar(255) NOT NULL,
  rating_for_owner integer,
  review_for_owner varchar(511),
  rating_for_taker integer,
  review_for_taker varchar(511),
  created_at timestamp DEFAULT current_timestamp,
  FOREIGN KEY (service_id, owner, pet_name) REFERENCES bidding(service_id, bidder, pet_name) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT "Rating for pet owner is not valid." CHECK (rating_for_owner > 0 AND rating_for_owner <= 5),
  CONSTRAINT "Rating for care taker is not valid." CHECK (rating_for_taker > 0 AND rating_for_taker <= 5)
);
