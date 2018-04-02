<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/04/01
 * Time: 00:49
 */
class Offer {

	/**
     * Create offer
     * @param string $username to insert
     * @param string $start_date to insert
     * @param string $end_date to insert
     * @param string $decision_deadline to insert
     * @param int $expected_salary to insert
     * @return true if create offer success.
     */
	public static function createOffer(string $username, string $start_date, string $end_date,
		string $decision_deadline, string $expected_salary, array $type_selected): bool {
		$db = new Database();
        $query = "INSERT INTO service_offers(provider, start_date, end_date,".
        	"decision_deadline, expected_salary) VALUES (?, ?, ?, ?, ?)";
        $params = array($username, $start_date, $end_date, $decision_deadline, $expected_salary);
        // TODO: Insert into table service_offers and service_target
        return $db->insertOrUpdate($query, $params);
	}

	public static function queryOffer(string $service_id):array {
		$db = new Database();
		$query = "SELECT * FROM service_offers WHERE service_id = ?";
		$params = array($service_id);

		return $db->query($query, $params);
	}

	public static function editOffer(string $service_id, string $start_date, string $end_date,
		string $decision_deadline, string $expected_salary, array $type_selected): bool {
		$db = new Database();
		$query = "UPDATE service_offers SET start_date = ?, end_date = ?, decision_deadline = ?, expected_salary = ?".
			"WHERE service_id = ?";
		$params = array($start_date, $end_date, $decision_deadline, $expected_salary, $service_id);
		// TODO: Update table service_offers and service_target
		return $db->insertOrUpdate($query, $params);
	}

	public static function checkOfferCreator(string $service_id, string $username): bool {
		$db = new Database();
		$query = "SELECT 1 FROM service_offers WHERE service_id = ? AND provider = ?";
		return !empty($db->query($query, array($service_id, $username)));
	}

	public static function deleteOffer(string $service_id) {
		$db = new Database();
		$query = "DELETE FROM service_offers WHERE service_id = ?";
		return $db->insertOrUpdate($query, array($service_id));
	}
}