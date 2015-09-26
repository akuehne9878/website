<?php

namespace website\application\presentation\views\sections;

use Commons\view\View;

/**
 * FotosView
 */
class FotosView extends View {
	private $id;
	private $title;
	private $galleryItemViews = array ();
	private $galleries = array ();
	private $hidden;

	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/sections/fotos.php" );
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

	public function getGalleryItemViews() {
		return $this->galleryItemViews;
	}

	public function setGalleryItemViews($galleryItemViews) {
		$this->galleryItemViews = $galleryItemViews;
	}

	public function getGalleries() {
		return $this->galleries;
	}

	public function setGalleries($galleries) {
		$this->galleries = $galleries;
	}
	
	public function setHidden($hidden) {
		$this->hidden = $hidden;
	}
	
	public function getHidden() {
		return $this->hidden;
	}

}
