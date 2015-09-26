<?php

namespace website\application\dal\persistence\dao\ext;

use website\application\dal\persistence\dao\base\GalleryDAOBase;
use website\application\business\model\GalleryItem;
use website\application\business\model\Gallery;
use website\application\presentation\views\sections\GalleryItemView;

class GalleryDAOExt extends GalleryDAOBase {
	
	
	/**
	 * queryAllActiveGalleries
	 */
	public function queryAllActiveGalleries() {
		// define the statement
		$sql = '
				SELECT 
					gallery_seq AS gallerySeq, 
					name AS name, 
					active AS active 
				FROM gallery
				WHERE gallery.active = 1';
		
		// execute
		return parent::executeReadStatement ( $sql, array (), Gallery::class );		
	}
	
	/**
	 * 
	 * @return multitype:
	 */
	public function queryForSectionOverview() {
		$sql= '	SELECT 
					gallery_item.gallery_item_seq AS galleryItemSeq, 
					gallery_item.title AS title, 
					gallery_item.content_link AS contentLink, 
					gallery_item.thumbnail_link AS thumbnailLink, 
					gallery_item.description AS description,
					gallery_item.type as type,
					gallery_item.active as active,
					GROUP_CONCAT(gallery.name SEPARATOR ",") AS "dataGroup"
				FROM gallery_item
					INNER JOIN gallery_content ON gallery_content.gallery_item_seq = gallery_item.gallery_item_seq
					INNER JOIN gallery ON gallery_content.gallery_seq = gallery.gallery_seq
				WHERE gallery_item.active = 1
				GROUP BY gallery_item.gallery_item_seq, gallery_item.title, gallery_item.content_link, gallery_item.thumbnail_link, gallery_item.description, gallery_item.type, gallery_item.active
				ORDER BY gallery.position, gallery_content.position
				LIMIT 9';		

		// execute
		return parent::executeReadStatement ( $sql, array (), GalleryItemView::class );
	}
	
	/**
	 *
	 * @return multitype:
	 */
	public function queryAllGalleryItems() {
		$sql= '	SELECT
					gallery_item.gallery_item_seq AS galleryItemSeq,
					gallery_item.title AS title,
					gallery_item.content_link AS contentLink,
					gallery_item.thumbnail_link AS thumbnailLink,
					gallery_item.description AS description,
					gallery_item.type as type,
					gallery_item.active as active,
					GROUP_CONCAT(gallery.name SEPARATOR ",") AS "dataGroup"
				FROM gallery_item
					INNER JOIN gallery_content ON gallery_content.gallery_item_seq = gallery_item.gallery_item_seq
					INNER JOIN gallery ON gallery_content.gallery_seq = gallery.gallery_seq
				WHERE gallery_item.active = 1
				GROUP BY gallery_item.gallery_item_seq, gallery_item.title, gallery_item.content_link, gallery_item.thumbnail_link, gallery_item.description, gallery_item.type, gallery_item.active
				ORDER BY gallery.position, gallery_content.position';
	
		// execute
		return parent::executeReadStatement ( $sql, array (), GalleryItemView::class );
	}
	
	
	/**
	 * queryAllItemsOfGallery
	 * @param unknown $gallerySeq
	 */
	public function queryAllItemsOfGallery($gallerySeq) {
		// define the statement
		$sql = '	
				SELECT 
					gallery_item.gallery_item_seq AS galleryItemSeq, 
					title AS title, type AS type, 
					content_link AS contentLink, 
					thumbnail_link AS thumbnailLink, 
					description AS description, 
					active AS active 
				FROM gallery_item
					INNER JOIN gallery_content ON gallery_content.gallery_item_seq = gallery_item.gallery_item_seq
						AND gallery_content.gallery_seq = :gallery_seq					
				WHERE gallery_item.active = 1
				ORDER BY gallery_content.position';		

		// set the bind params
		$bindparams [':gallery_seq'] = $gallerySeq;
	
		// execute
		return parent::executeReadStatement ( $sql, $bindparams, GalleryItem::class );
	}	

}
