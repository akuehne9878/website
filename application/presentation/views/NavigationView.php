<?php

namespace website\application\presentation\views;

use Commons\view\View;

use website\application\presentation\views\SectionView;

/**
 * NavigationView
 */
class NavigationView extends View {

	private $sections = array();
	private $sectionsAndNavigationOnSamePage = false;
    
    public function __construct() {
    	parent::__construct("website/application/presentation/templates/navigation.php");
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
