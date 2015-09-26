<?php

namespace website\application\presentation\views;

use Commons\view\View;

/**
 * HeaderView
 */
class HeaderView extends View {
	private $title;
	private $description;
	private $author;
	private $image;
	private $url;
	
	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/header.php" );
	}
	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setAuthor($author){
		$this->author = $author;
	}

	public function getImage(){
		return $this->image;
	}

	public function setImage($image){
		$this->image = $image;
	}

	public function getUrl(){
		return $this->url;
	}
	
	public function setUrl($url){
		$this->url = $url;
	}	
}
