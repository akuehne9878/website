<?php

namespace website\application\presentation\views;

use Commons\view\View;

/**
 * SinglePageView
 */
class SinglePageView extends View {
	private $title;
	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/singlepage.php" );
	}
	public function setTitle($title) {
		$this->title = $title;
	}
	public function getTitle() {
		return $this->title;
	}
}
