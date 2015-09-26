<?php

namespace website\application\presentation\views\sections;

use Commons\view\View;

class GalleryItemView extends View {
	private $galleryItemSeq;
	private $title;
	private $type;
	private $contentLink;
	private $thumbnailLink;
	private $description;
	private $active;
	private $dataGroup;
	
	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/sections/galleryitemview.php" );
	}

	public function getGalleryItemSeq() {
		return $this->galleryItemSeq;
	}

	public function setGalleryItemSeq($galleryItemSeq) {
		$this->galleryItemSeq = $galleryItemSeq;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getType() {
		return $this->type;
	}

	public function setType($type) {
		$this->type = $type;
	}

	public function getContentLink() {
		return $this->contentLink;
	}

	public function setContentLink($contentLink) {
		$this->contentLink = $contentLink;
	}

	public function getThumbnailLink() {
		return $this->thumbnailLink;
	}

	public function setThumbnailLink($thumbnailLink) {
		$this->thumbnailLink = $thumbnailLink;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getActive() {
		return $this->active;
	}

	public function setActive($active) {
		$this->active = $active;
	}

	public function getDataGroup() {
		return $this->dataGroup;
	}

	public function setDataGroup($dataGroup) {
		$this->dataGroup = $dataGroup;
	}

}