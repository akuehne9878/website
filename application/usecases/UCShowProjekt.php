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
use website\application\presentation\views\singlepages\ProjektView;

/**
 * UCShowProjekt
 */
class UCShowProjekt {

	
	public function renderView() {
		// render header
		$header = new HeaderView ();
		$header->setAuthor("raumklang");
		$header->setTitle ( "raumklang - Unser Projekt" );
		$header->setDescription("raumklang - Unser Projekt");
		$header->setUrl("www.raumklang-band.at/projekt");
		$header->render ();
		
		$ucShowLandingPage = new UCShowLandingPage($this->userContext);
		
		// render navigation
		$sections = $ucShowLandingPage->getSections ();
		$navigation = new NavigationView ();
		foreach ( $sections as $section ) {
			$navigation->addSection ( $section );
		}
		$navigation->render ();
		
		
		$projektView = new ProjektView();
        $projektView->render();
		
		
		// render footer
		$footer = new FooterView ();
		foreach ( $sections as $section ) {
			$footer->addSection ( $section );
		}
		$footer->render ();
	}

}
