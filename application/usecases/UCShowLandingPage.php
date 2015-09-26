<?php

namespace website\application\usecases;

use website\application\presentation\views\HeaderView;
use website\application\presentation\views\FooterView;
use website\application\presentation\views\SectionView;
use website\application\presentation\views\HeaderPicView;
use website\application\presentation\views\NavigationView;
use website\application\presentation\views\sections\BandView;
use website\application\presentation\views\sections\FotosView;
use website\application\presentation\views\sections\KonzerteView;
use website\application\presentation\views\sections\EventView;
use website\application\presentation\views\sections\HomeView;
use website\application\presentation\views\sections\KontaktView;
use website\application\presentation\views\sections\MusikView;
use website\application\business\model\Event;
use website\application\presentation\views\sections\DownloadsView;
use website\application\dal\persistence\dao\ext\EventDAOExt;
use website\application\dal\persistence\dao\ext\GalleryDAOExt;

/**
 * UCShowLandingPage
 */
class UCShowLandingPage {
	public function renderView() {
		
		// render header
		$header = new HeaderView ();
		$header->setAuthor ( "raumklang" );
		$header->setTitle ( "raumklang" );
		$header->setDescription ( "raumklang ist eine vierköpfige Deutsch-Pop Rock Band aus Feldkirch (Vorarlberg), die 2012 gegründet wurde. Die Band zeichnet sich durch einen vielfältigen Musikstil aus, welcher sich von kraftvollen Pop Balladen über knackigen Rock bis hin zu funkigen Rap Elementen erstreckt. Die warme Stimme des Sängers, sowie die eingängigen Gitarrenriffs erzeugen einen unverkennbaren Sound mit dem sich die Band von der Masse abhebt." );
		$header->setUrl ( "www.raumklang-band.at" );
		$header->setImage ( "www.raumklang-band.at/website/htdocs/img/raumklang_header.jpg" );
		$header->render ();
		
		// render navigation
		$sections = $this->getSections ();
		$navigation = new NavigationView ();
		$navigation->setSectionsAndNavigationOnSamePage ( true );
		foreach ( $sections as $section ) {
			$navigation->addSection ( $section );
		}
		$navigation->render ();
		
		$hero = new HeaderPicView ();
		$hero->render ();
		
		// // render start screen
		// $home = new HomeView();
		// $home->render();
		
		// render sections
		foreach ( $sections as $section ) {
			$section->render ();
		}
		
		// render footer
		$footer = new FooterView ();
		$footer->setSectionsAndNavigationOnSamePage ( true );
		foreach ( $sections as $section ) {
			$footer->addSection ( $section );
		}
		$footer->render ();
	}
	public function getSections() {
		$ret = array ();
		
		$konzerte = $this->getKonzerteSection ();
		// special case here: $konzerte could be null if no events are available to display
		 if ($konzerte != null) {
			array_push ( $ret, $konzerte );
		 }
		
		$band = new BandView ();
		$band->setTitle ( "band" );
		$band->setId ( "band" );
		array_push ( $ret, $band );
		
		$bilder = new FotosView ();
		$bilder->setId ( "fotos" );
		$bilder->setTitle ( "fotos" );
		$bilder->setHidden(true);
		
		
		$galleryDAO = new GalleryDAOExt();
 		$galleryItemViews = $galleryDAO->queryForSectionOverview(); 		
 		$bilder->setGalleryItemViews($galleryItemViews); 		
		array_push ( $ret, $bilder );
		
		$musik = new MusikView ();
		$musik->setTitle ( "musik" );
		$musik->setId ( "musik" );
		array_push ( $ret, $musik );
		
		$downloads = new DownloadsView ();
		$downloads->setTitle ( "downloads" );
		$downloads->setId ( "downloads" );
		array_push ( $ret, $downloads );
		
		$kontakt = new KontaktView ();
		$kontakt->setTitle ( "kontakt" );
		$kontakt->setId ( "kontakt" );
		array_push ( $ret, $kontakt );
		
		return $ret;
	}
	
	/**
	 *
	 * @return \website\application\usecases\viewelements\SectionView
	 */
	private function getKonzerteSection() {
		$konzerteView = new KonzerteView ();
		$konzerteView->setTitle ( "nächste konzerte" );
		$konzerteView->setId ( "konzerte" );
		
		$events = array ();	// event business objects
		$eventViews = array(); // views of each event
		
		$dao = new EventDAOExt ();
		$events = $dao->queryAllActiveEvents();
		
		
		foreach ( $events as $e ) {
			// set correct date format
			$date = \DateTime::createFromFormat('Y-m-d', $e->getDate());
			$e->setDate($date->getTimestamp());
			
			// create view for each event
			$eventView = new EventView ( $e );
			array_push ( $eventViews, $eventView );
		}
		

		
		
		// only return if we have some events to display
		if (sizeof ( $eventViews ) > 0) {
			$konzerteView->setEvents ( $eventViews );
			return $konzerteView;
		} else {
			return null;
		}
	}
}
