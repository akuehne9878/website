<?php

namespace website\application\presentation\views\sections;

use Commons\view\View;

/**
 * MusikView
 */
class MusikView extends View {
	private $id;
	private $title;
	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/sections/musik.php" );
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
