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

-- Checks that the provider of a service has a user profile of "Care Taker".
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

-- Checks that the status of the bidding for a history is 'succeed'.
CREATE OR REPLACE FUNCTION check_service_history_type()
RETURNS TRIGGER AS $$
DECLARE
	succeedCount integer;
	failCount integer;
	totalCount integer;
BEGIN
	-- There should be one and only one bidding for this history reflected as successful.
	SELECT COUNT(*) INTO totalCount FROM bidding b WHERE b.service_id = NEW.service_id;
	SELECT COUNT(*) INTO succeedCount FROM bidding b WHERE b.service_id = NEW.service_id AND b.status = 'succeed';
	SELECT COUNT(*) INTO failCount FROM bidding b WHERE b.service_id = NEW.service_id AND b.status = 'fail';

	IF succeedCount != 1 OR failCount != totalCount - 1 THEN
		RAISE EXCEPTION 'The corresponding bidding status is not reflected as successful.';
		RETURN NULL;
	END IF;
	RETURN NEW;
END; $$
LANGUAGE PLPGSQL;

-- Validation when inserting a new row into "service_history" table.
CREATE TRIGGER service_history_valid_type
BEFORE INSERT OR UPDATE
ON service_history
FOR EACH ROW
EXECUTE PROCEDURE check_service_history_type();

-- Updates a user profile's overall score.
CREATE OR REPLACE FUNCTION update_user_profile_score()
RETURNS TRIGGER AS $$
DECLARE
	takerName varchar(255);
BEGIN
	-- First get the care taker's username.
	SELECT MIN(provider) INTO takerName FROM service_offers WHERE service_id = NEW.service_id;

	-- Updates the care taker's overall score.
	With TakerHistory AS
		(SELECT * FROM service_history h
		 WHERE h.service_id IN (
			SELECT o.service_id FROM service_offers o WHERE o.provider = takerName
		))
	UPDATE user_profiles p SET score = (SELECT AVG(rating_for_taker) FROM TakerHistory) 
	WHERE p.username = takerName AND p.type = 'peter';

	-- Updates the pet owner's overall score.
	With OwnerHistory AS
		(SELECT * FROM service_history h WHERE h.owner = NEW.owner)
	UPDATE user_profiles p SET score = (SELECT AVG(rating_for_owner) FROM OwnerHistory) 
	WHERE p.username = takerName AND p.type = 'owner';

	RETURN NEW;
END; $$
LANGUAGE PLPGSQL;

-- Updates the user profile's overall score when the rating for a single row in "service_history" table changes.
CREATE TRIGGER service_history_update_user_profile_overall_score
AFTER INSERT OR UPDATE
ON service_history
FOR EACH ROW
EXECUTE PROCEDURE update_user_profile_score();
