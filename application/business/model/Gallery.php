<?php

namespace website\application\business\model;

/**
 * Class represents table 'gallery'
 */
class Gallery {
	private $gallerySeq;
	private $name;
	private $position;
	private $active;
	private $initial;

	public function getGallerySeq() {
		return $this->gallerySeq;
	}

	public function getName() {
		return $this->name;
	}

	public function getPosition() {
		return $this->position;
	}

	public function getActive() {
		return $this->active;
	}

	public function getInitial() {
		return $this->initial;
	}

	public function setGallerySeq($gallerySeq) {
		$this->gallerySeq = $gallerySeq;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function setPosition($position) {
		$this->position = $position;
	}

	public function setActive($active) {
		$this->active = $active;
	}

	public function setInitial($initial) {
		$this->initial = $initial;
	}

}