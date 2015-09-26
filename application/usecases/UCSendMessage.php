<?php

namespace website\application\usecases;

use website\application\presentation\views\singlepages\MailView;
use website\application\presentation\views\HeaderView;
use website\application\presentation\views\FooterView;
use website\application\presentation\views\NavigationView;

/**
 * UCSendMessage
 */
class UCSendMessage {
	

	public function execute($name, $email, $message) {
		$success = false;
		
		if ($name != null && $email != null && $message != null) {
			$to      = 'booking@raumklang-band.at';
			$subject = 'Neue Mail von ' . $name . ' erhalten';
			$headers = 'From: '. $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();
			
			mail($to, $subject, $message, $headers);
				
			$success = true;
		}
		
		
		/**
		 * render View
		 */
		$this->renderView($success);
	}
	
	public function renderView($success) {
		// render header
		$header = new HeaderView ();
		$header->setAuthor("raumklang");
		$header->setTitle ( "raumklang - Nachricht" );
		$header->setDescription("raumklang - Nachricht");
		$header->setUrl("www.raumklang-band.at/mail");
		$header->render ();
		
		$ucShowLandingPage = new UCShowLandingPage($this->userContext);
		
		// render navigation
		$sections = $ucShowLandingPage->getSections ();
		$navigation = new NavigationView ();
		foreach ( $sections as $section ) {
			$navigation->addSection ( $section );
		}
		$navigation->render ();
		
		
		$mailView = new MailView();
		$mailView->setSuccess($success);
		$mailView->render();
		
		
		// render footer
		$footer = new FooterView ();
		foreach ( $sections as $section ) {
			$footer->addSection ( $section );
		}
		$footer->render ();
	}
	
	
}