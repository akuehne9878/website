<?php


namespace website\application\usecases;


use website\application\presentation\views\sections\FotosView;
use website\application\dal\persistence\dao\ext\GalleryDAOExt;
use website\application\presentation\views\sections\GalleryItemView;


/**
 * UCLoadAllGalleries
 */
class UCLoadAllGalleries {
	
	
	public function loadAllGalleries() {
		$bilder = new FotosView ();
		$bilder->setId ( "fotos" );
		$bilder->setTitle ( "fotos" );
		
		
 		$galleryDAO = new GalleryDAOExt();
 		
 		$galleries = $galleryDAO->queryAllActiveGalleries();
 		$bilder->setGalleries($galleries);
 		
 		$galleryItemViews = $galleryDAO->queryAllGalleryItems();
 		$bilder->setGalleryItemViews($galleryItemViews);
 		
		$bilder->render();
	}
	

}