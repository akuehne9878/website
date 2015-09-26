<?php

namespace website\application\presentation\views;

use Commons\view\View;

/**
 * FooterView
 */
class FooterView extends View {
	
	private $sections = array();
	private $sectionsAndNavigationOnSamePage = false;
	
	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/footer.php" );
	}
	
    public function addSection($section) {
    	array_push($this->sections, $section);
    }
    
    public function getSections() {
    	return $this->sections;
    }
    
    public function setSectionsAndNavigationOnSamePage($sectionsAndNavigationOnSamePage) {
    	$this->sectionsAndNavigationOnSamePage = $sectionsAndNavigationOnSamePage;
    }
    
    public function getSectionsAndNavigationOnSamePage() {
    	return $this->sectionsAndNavigationOnSamePage;
    }
}
