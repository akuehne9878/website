<?php

namespace website\application\presentation\views;

use Commons\view\View;

/**
 * SectionView
 */
class SectionView extends View {
	private $title;
	private $childView;
	private $id;
	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/section.php" );
	}
	public function setTitle($title) {
		$this->title = $title;
	}
	public function getTitle() {
		return $this->title;
	}
	public function setChildView($childView) {
		$this->childView = $childView;
	}
	public function getChildView() {
		return $this->childView;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
}
