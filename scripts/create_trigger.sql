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

CREATE TRIGGER pet_owner_valid_type
BEFORE INSERT OR UPDATE
ON pets
FOR EACH ROW
EXECUTE PROCEDURE check_pet_owner_type();