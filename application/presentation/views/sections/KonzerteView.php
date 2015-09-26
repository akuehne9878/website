<?php

namespace website\application\presentation\views\sections;

use Commons\view\View;

/**
 * KonzerteView
 */
class KonzerteView extends View {
	private $id;
	private $title;
	private $events;
	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/sections/konzerte.php" );
	}
	public function setEvents($events) {
		$this->events = $events;
	}
	public function getEvents() {
		return $this->events;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setTitle($title) {
		$this->title = $title;
	}
	public function getTitle() {
		return $this->title;
	}
}
