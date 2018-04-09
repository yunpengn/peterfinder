<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/04/01
 * Time: 00:49
 */
class Offer {
    /**
     * @return array of all opening offers (has not passed decision deadline yet).
     */
    public static function all(): array {
        $db = new Database();
        $query = "SELECT * FROM opening_offers";
        return $db->query($query, array());
    }

    /**
     * Create offer
     * @param string $username to insert
     * @param string $start_date to insert
     * @param string $end_date to insert
     * @param string $decision_deadline to insert
     * @param string $expected_salary to insert
     * @param array $type_selected
     * @return true if create offer success.
     */
	public static function create(string $username, string $start_date, string $end_date,
                                    string $decision_deadline, string $expected_salary, array $type_selected): bool {
		$db = new Database();
		// First inserts a new row into service_offers table and returns the resulting service_id.
        $query = "INSERT INTO service_offers (provider, start_date, end_date, decision_deadline, expected_salary)"
            . " VALUES (?, ?, ?, ?, ?) RETURNING service_id";
        $params = array($username, $start_date, $end_date, $decision_deadline, $expected_salary);
        $service_id = $db->query($query, $params)[0]["service_id"];

        // Then inserts each selected type into the service_target table.
        $queries = array();
        $params = array();
        foreach ($type_selected as $type) {
            array_push($queries, "INSERT INTO service_target (service_id, type) VALUES (?, ?)");
            array_push($params, array($service_id, $type));
        }
        return $db->transact($queries, $params);
	}

	public static function queryOffer(string $service_id):array {
		$db = new Database();
		$query = "SELECT * FROM service_offers WHERE service_id = ?";
		$params = array($service_id);

		return $db->query($query, $params);
	}

	public static function queryOfferByProvider(string $username): array {
		$db = new Database();
		$query = "SELECT * FROM service_offers WHERE provider = ?";
		$params = array($username);

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

    /**
     * Deletes a certain offer.
     *
     * @param string $service_id
     * @return bool
     */
    public static function delete(string $service_id): bool {
		$db = new Database();
		$query = "DELETE FROM service_offers WHERE service_id = ? AND provider = ?";
		return $db->insertOrUpdate($query, array($service_id, $_SESSION['username']));
	}

	public static function queryServiceTarget($service_id): array {
		$db = new Database();
		$query = "SELECT * FROM service_target WHERE service_id = ?";
		$result = $db->query($query, array($service_id));
		return array_map(function($target) { return $target["type"]; }, $result);
	}
}

