<?php

namespace website\application\presentation\views\sections;

use Commons\view\View;

use website\application\business\model\Event;

class EventView extends View {
	private $event;
	private $eventLinkname;
	private $eventLink;
	private $eventWeekday;
	private $eventDay;
	private $eventMonth;
	private $eventYear;
	public function __construct(Event $event) {
		parent::__construct ( "website/application/presentation/templates/sections/event.php" );
		
		$this->event = $event;
		$this->setEventLinkName ( $event->getEventLinkName () );
		$this->setEventLink ( $event->getEventLink () );
		
		// set the gui date
 		$this->setEventYear(date("Y", $event->getDate()));
 		$this->setEventDay(date("d", $event->getDate()));
		
		$this->applyEventWeekday();
		$this->applyEventMonth();
	}
	
	private function applyEventWeekday() {
		$arr = array ();
		$arr ["monday"] = "MO";
		$arr ["tuesday"] = "DI";
		$arr ["wednesday"] = "MI";
		$arr ["thrusday"] = "DO";
		$arr ["friday"] = "FR";
		$arr ["saturday"] = "SA";
		$arr ["sunday"] = "SO";
	
		$weekday = date("l", $this->event->getDate());
		$this->setEventWeekday( $arr[strtolower($weekday)]);
	}
	
	
	private function applyEventMonth() {
		$arr = array ();
		$arr ["01"] = "JAN";
		$arr ["02"] = "FEB";
		$arr ["03"] = "MRZ";
		$arr ["04"] = "APR";
		$arr ["05"] = "MAI";
		$arr ["06"] = "JUN";		
		$arr ["07"] = "JUL";
		$arr ["08"] = "AUG";
		$arr ["09"] = "SEP";
		$arr ["10"] = "OKT";
		$arr ["11"] = "NOV";
		$arr ["12"] = "DEZ";		
		
		$month = date("m", $this->event->getDate());
		$this->setEventMonth ( $arr[$month] );
	}
	
	
	public function getTitle() {
		return $this->event->getTitle ();
	}
	public function setTitle($title) {
		$this->event->setTitle ( $title );
	}
	public function getLocation() {
		return $this->event->getLocation ();
	}
	public function setLocation($location) {
		$this->event->setLocation ( $location );
	}
	public function getEventLink() {
		return $this->event->getEventLink ();
	}
	public function setEventLink($eventLink) {
		$this->event->setEventLink ( $eventLink );
	}
	public function getEventLinkName() {
		return $this->eventLinkName;
	}
	public function setEventLinkname($eventLinkName) {
		$this->eventLinkName = $eventLinkName;
	}
	public function getDescription() {
		return $this->event->getDescription ();
	}
	public function setDescription($description) {
		$this->event->setDescription ( $description );
	}
	public function getEventWeekday() {
		return $this->eventWeekday;
	}
	public function setEventWeekday($eventWeekday) {
		$this->eventWeekday = $eventWeekday;
	}
	public function getEventDay() {
		return $this->eventDay;
	}
	public function setEventDay($eventDay) {
		$this->eventDay = $eventDay;
	}
	public function getEventMonth() {
		return $this->eventMonth;
	}
	public function setEventMonth($eventMonth) {
		$this->eventMonth = $eventMonth;
	}
	public function getEventYear() {
		return $this->eventYear;
	}
	public function setEventYear($eventYear) {
		$this->eventYear = $eventYear;
	}
}