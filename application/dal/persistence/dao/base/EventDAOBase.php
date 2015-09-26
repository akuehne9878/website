<?php

namespace website\application\dal\persistence\dao\base;

use website\application\dal\persistence\dao\IEventDAO;
use website\application\business\model\Event;
use website\application\dal\persistence\core\AbstractDAO;

/**
 * Class that operates on table 'event'
 */
class EventDAOBase extends AbstractDAO implements IEventDAO {

	/**
	 * Constructor with optional connection
	 */
	public function __construct(PDO $connection = null) {
		parent::__construct ( Event::class, $connection );
	}

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id
	 *        	primary key
	 * @return Event
	 */
	public function load($event_seq) {
		// define the statement
		$sql = 'SELECT event_seq AS eventSeq, title AS title, location AS location, location_link AS locationLink, date AS date, time AS time, event_link AS eventLink, event_link_name AS eventLinkName, active AS active, description AS description
				FROM event
				WHERE 1=1 
					AND event_seq = :event_seq';
		
		// set the bind params
		$bindparams [':event_seq'] = $event_seq;
		
		// execute
		return parent::load ( $sql, $bindparams );
	}

	/**
	 * Get all records from table
	 */
	public function queryAll() {
		// define the statement
		$sql = 'SELECT event_seq AS eventSeq, title AS title, location AS location, location_link AS locationLink, date AS date, time AS time, event_link AS eventLink, event_link_name AS eventLinkName, active AS active, description AS description
				FROM event';
		
		// execute
		return parent::executeReadStatement ( $sql, array (), Event::class );
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column
	 *        	name
	 */
	public function queryAllOrderBy($field) {
		// define the statement
		$sql = 'SELECT event_seq AS eventSeq, title AS title, location AS location, location_link AS locationLink, date AS date, time AS time, event_link AS eventLink, event_link_name AS eventLinkName, active AS active, description AS description
				FROM event
				ORDER BY ' . $field;
		
		// execute
		return parent::executeReadStatement ( $sql, array (), Event::class );
	}

	/**
	 * Delete record from table
	 * 
	 * @param
	 *        	event primary key
	 */
	public function delete($event_seq) {
		// define the statement
		$sql = 'DELETE FROM event
				WHERE 1=1 
					AND event_seq = :event_seq';
		
		// set the bind params
		$bindparams [':event_seq'] = $event_seq;
		
		// execute
		return parent::delete ( $sql, $bindparams );
	}

	/**
	 * Insert record to table
	 *
	 * @param
	 *        	Event event
	 */
	public function insert($object) {
		// define the statement
		$sql = 'INSERT INTO event (event_seq, title, location, location_link, date, time, event_link, event_link_name, active, description)
				VALUES (:event_seq, :title, :location, :location_link, :date, :time, :event_link, :event_link_name, :active, :description)';
		
		// set the bind params
		$bindparams [':event_seq'] = $object->getEventSeq ();
		$bindparams [':title'] = $object->getTitle ();
		$bindparams [':location'] = $object->getLocation ();
		$bindparams [':location_link'] = $object->getLocationLink ();
		$bindparams [':date'] = $object->getDate ();
		$bindparams [':time'] = $object->getTime ();
		$bindparams [':event_link'] = $object->getEventLink ();
		$bindparams [':event_link_name'] = $object->getEventLinkName ();
		$bindparams [':active'] = $object->getActive ();
		$bindparams [':description'] = $object->getDescription ();
		
		// execute
		return parent::save ( $sql, $bindparams );
	}

	/**
	 * Update record in table
	 *
	 * @param
	 *        	Event event
	 */
	public function update($object) {
		// define the statement
		$sql = 'UPDATE event SET
					title = :title,
					location = :location,
					location_link = :location_link,
					date = :date,
					time = :time,
					event_link = :event_link,
					event_link_name = :event_link_name,
					active = :active,
					description = :description
				WHERE 1=1
					AND event_seq = :event_seq';
		
		// set the bind params
		$bindparams [':event_seq'] = $object->getEventSeq ();
		$bindparams [':title'] = $object->getTitle ();
		$bindparams [':location'] = $object->getLocation ();
		$bindparams [':location_link'] = $object->getLocationLink ();
		$bindparams [':date'] = $object->getDate ();
		$bindparams [':time'] = $object->getTime ();
		$bindparams [':event_link'] = $object->getEventLink ();
		$bindparams [':event_link_name'] = $object->getEventLinkName ();
		$bindparams [':active'] = $object->getActive ();
		$bindparams [':description'] = $object->getDescription ();
		
		// execute
		return parent::update ( $sql, $bindparams );
	}

	/**
	 * Delete all rows
	 */
	public function clean() {
		$sql = 'DELETE FROM event';
		return parent::delete ( $sql, array () );
	}

}
