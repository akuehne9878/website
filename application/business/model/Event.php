<?php

namespace website\application\business\model;

/**
 * Class represents table 'event'
 */
class Event {
	private $eventSeq;
	private $title;
	private $location;
	private $locationLink;
	private $date;
	private $time;
	private $eventLink;
	private $eventLinkName;
	private $active;
	private $description;

	public function getEventSeq() {
		return $this->eventSeq;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getLocation() {
		return $this->location;
	}

	public function getLocationLink() {
		return $this->locationLink;
	}

	public function getDate() {
		return $this->date;
	}

	public function getTime() {
		return $this->time;
	}

	public function getEventLink() {
		return $this->eventLink;
	}

	public function getEventLinkName() {
		return $this->eventLinkName;
	}

	public function getActive() {
		return $this->active;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setEventSeq($eventSeq) {
		$this->eventSeq = $eventSeq;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function setLocation($location) {
		$this->location = $location;
	}

	public function setLocationLink($locationLink) {
		$this->locationLink = $locationLink;
	}

	public function setDate($date) {
		$this->date = $date;
	}

	public function setTime($time) {
		$this->time = $time;
	}

	public function setEventLink($eventLink) {
		$this->eventLink = $eventLink;
	}

	public function setEventLinkName($eventLinkName) {
		$this->eventLinkName = $eventLinkName;
	}

	public function setActive($active) {
		$this->active = $active;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

}