<?php

namespace website\application\dal\persistence\dao\ext;

use website\application\business\model\Event;
use website\application\dal\persistence\dao\base\EventDAOBase;

class EventDAOExt extends EventDAOBase {

	/**
	 * Get all records from table
	 */
	public function queryAllActiveEvents() {
		// define the statement
		$sql = 'SELECT event_seq AS eventSeq, title AS title, location AS location, location_link AS locationLink, date AS date, time AS time, event_link AS eventLink, event_link_name AS eventLinkName, active AS active, description AS description
				FROM event WHERE 
				active = 1
				AND date > CURRENT_DATE()
				ORDER BY date
				LIMIT 3			
				';
		
		// execute
		return parent::executeReadStatement ( $sql, array (), Event::class );
	}

}
