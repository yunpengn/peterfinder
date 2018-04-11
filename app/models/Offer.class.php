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
    public static function othersOffers(): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT o.service_id, o.provider, o.start_date, o.end_date, o.decision_deadline, o.expected_salary, "
            . " (SELECT string_agg(type, ', ') FROM service_target t WHERE t.service_id = o.service_id) "
            . "AS target FROM opening_offers o WHERE o.provider <> ?;";
        return $db->query($query, array($_SESSION['username']));
    }

    public static function queryOfferByProvider(): array {
        if (!isset($_SESSION['username'])) {
            return array();
        }
        $db = new Database();
        $query = "SELECT o.service_id, o.provider, o.start_date, o.end_date, o.decision_deadline, o.expected_salary, "
            . " (SELECT string_agg(type, ', ') FROM service_target t WHERE t.service_id = o.service_id) "
            . "AS target FROM opening_offers o WHERE o.provider = ?;";
        return $db->query($query, array($_SESSION['username']));
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
	public static function create(string $start_date, string $end_date,
                                    string $decision_deadline, string $expected_salary, array $type_selected): bool {
                if (!isset($_SESSION['username'])) {
                    return false;
                }
		$db = new Database();
		// First inserts a new row into service_offers table and returns the resulting service_id.
        $query = "INSERT INTO service_offers (provider, start_date, end_date, decision_deadline, expected_salary)"
            . " VALUES (?, ?, ?, ?, ?) RETURNING service_id";
        $params = array($_SESSION['username'], $start_date, $end_date, $decision_deadline, $expected_salary);
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

		return $db->query($query, $params)[0];
	}

	public static function editOffer(string $service_id, string $start_date, string $end_date,
		string $decision_deadline, string $expected_salary, array $type_selected): bool {
		$db = new Database();

        // First updates the row in the service_offers table.
		$queries = array("UPDATE service_offers SET start_date = ?, end_date = ?, decision_deadline = ?, ".
			"expected_salary = ? WHERE service_id = ?");
		$params = array(array($start_date, $end_date, $decision_deadline, $expected_salary, $service_id));

        // Then updates the related rows in the service_target table.
        array_push($queries, "DELETE FROM service_target WHERE service_id = ?");
        array_push($params, array($service_id));
        foreach ($type_selected as $type) {
            array_push($queries, "INSERT INTO service_target (service_id, type) VALUES (?, ?)");
            array_push($params, array($service_id, $type));
        }
        return $db->transact($queries, $params);
	}

	public static function checkOfferCreator(string $service_id, string $username): bool {
		$db = new Database();
		$query = "SELECT provider FROM service_offers WHERE service_id = ?";
		$result = $db->query($query, array($service_id));
		return !empty($result) && $result[0]["provider"] == $username;
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

