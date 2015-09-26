<?php

namespace website\application\business\model;

/**
 * Class represents table 'gallery_item'
 */
class GalleryItem {
	private $galleryItemSeq;
	private $title;
	private $type;
	private $contentLink;
	private $thumbnailLink;
	private $description;
	private $active;

	public function getGalleryItemSeq() {
		return $this->galleryItemSeq;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getType() {
		return $this->type;
	}

	public function getContentLink() {
		return $this->contentLink;
	}

	public function getThumbnailLink() {
		return $this->thumbnailLink;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getActive() {
		return $this->active;
	}

	public function setGalleryItemSeq($galleryItemSeq) {
		$this->galleryItemSeq = $galleryItemSeq;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function setType($type) {
		$this->type = $type;
	}

	public function setContentLink($contentLink) {
		$this->contentLink = $contentLink;
	}

	public function setThumbnailLink($thumbnailLink) {
		$this->thumbnailLink = $thumbnailLink;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function setActive($active) {
		$this->active = $active;
	}

}