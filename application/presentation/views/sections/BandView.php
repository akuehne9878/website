<?php

namespace website\application\presentation\views\sections;

use Commons\view\View;

/**
 * BandView
 */
class BandView extends View {
	private $id;
	private $title;
	private $introductionText;
	
	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/sections/band.php" );
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
	public function setIntroductionText($introductionText) {
		$this->introductionText = $introductionText;
	}
	public function getIntroductionText() {
		return $this->introductionText;
	}
}
