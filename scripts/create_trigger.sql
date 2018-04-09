-- Checks that the owner of a pet has a user profile of "Pet Owner".
CREATE OR REPLACE FUNCTION check_pet_owner_type()
RETURNS TRIGGER AS $$
DECLARE
	count integer;
BEGIN
	SELECT COUNT(*) INTO count FROM user_profiles p WHERE p.username = NEW.username AND p.type = 'owner';
	IF count <= 0 THEN
		RAISE EXCEPTION '% is not a pet owner.', NEW.username;
		RETURN NULL;
	END IF;
	RETURN NEW;
END; $$
LANGUAGE PLPGSQL;

-- Validation when inserting a new row into "pet" table.
CREATE TRIGGER pet_owner_valid_type
BEFORE INSERT OR UPDATE
ON pets
FOR EACH ROW
EXECUTE PROCEDURE check_pet_owner_type();

-- Checks that the provider of a server has a user profile of "Care Taker".
CREATE OR REPLACE FUNCTION check_service_provider_type()
RETURNS TRIGGER AS $$
DECLARE
	count integer;
BEGIN
	SELECT COUNT(*) INTO count FROM user_profiles p WHERE p.username = NEW.provider AND p.type = 'peter';
	IF count <= 0 THEN
		RAISE EXCEPTION '% is not a care taker.', NEW.provider;
		RETURN NULL;
	END IF;
	RETURN NEW;
END; $$
LANGUAGE PLPGSQL;

-- Validation when inserting a new row into "service_offers" table.
CREATE TRIGGER service_provider_valid_type
BEFORE INSERT OR UPDATE
ON service_offers
FOR EACH ROW
EXECUTE PROCEDURE check_service_provider_type();

-- Checks that the bidder has a user profile of "Pet Owner".
CREATE OR REPLACE FUNCTION check_bidding_type()
RETURNS TRIGGER AS $$
DECLARE
	count integer;
BEGIN
	SELECT COUNT(*) INTO count FROM user_profiles p WHERE p.username = NEW.bidder AND p.type = 'owner';
	IF count <= 0 THEN
		RAISE EXCEPTION '% is not a care taker, thus he/she cannot participate in bidding.', NEW.bidder;
		RETURN NULL;
	END IF;
	RETURN NEW;
END; $$
LANGUAGE PLPGSQL;

-- Validation when inserting a new row into "bidding" table.
CREATE TRIGGER bidding_valid_type
BEFORE INSERT OR UPDATE
ON bidding
FOR EACH ROW
EXECUTE PROCEDURE check_bidding_type();
