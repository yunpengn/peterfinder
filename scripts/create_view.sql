CREATE VIEW opening_offers AS
  SELECT * FROM service_offers 
  WHERE decision_deadline > CURRENT_TIMESTAMP;
