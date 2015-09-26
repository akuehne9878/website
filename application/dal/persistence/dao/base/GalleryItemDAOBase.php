<?php

namespace website\application\dal\persistence\dao\base;

use website\application\dal\persistence\dao\IGalleryItemDAO;
use website\application\business\model\GalleryItem;
use website\application\dal\persistence\core\AbstractDAO;

/**
 * Class that operates on table 'gallery_item'
 */
class GalleryItemDAOBase extends AbstractDAO implements IGalleryItemDAO {

	/**
	 * Constructor with optional connection
	 */
	public function __construct(PDO $connection = null) {
		parent::__construct ( GalleryItem::class, $connection );
	}

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id
	 *        	primary key
	 * @return GalleryItem
	 */
	public function load($gallery_item_seq) {
		// define the statement
		$sql = 'SELECT gallery_item_seq AS galleryItemSeq, title AS title, type AS type, content_link AS contentLink, thumbnail_link AS thumbnailLink, description AS description, active AS active
				FROM gallery_item
				WHERE 1=1 
					AND gallery_item_seq = :gallery_item_seq';
		
		// set the bind params
		$bindparams [':gallery_item_seq'] = $gallery_item_seq;
		
		// execute
		return parent::load ( $sql, $bindparams );
	}

	/**
	 * Get all records from table
	 */
	public function queryAll() {
		// define the statement
		$sql = 'SELECT gallery_item_seq AS galleryItemSeq, title AS title, type AS type, content_link AS contentLink, thumbnail_link AS thumbnailLink, description AS description, active AS active
				FROM gallery_item';
		
		// execute
		return parent::executeReadStatement ( $sql, array (), GalleryItem::class );
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column
	 *        	name
	 */
	public function queryAllOrderBy($field) {
		// define the statement
		$sql = 'SELECT gallery_item_seq AS galleryItemSeq, title AS title, type AS type, content_link AS contentLink, thumbnail_link AS thumbnailLink, description AS description, active AS active
				FROM gallery_item
				ORDER BY ' . $field;
		
		// execute
		return parent::executeReadStatement ( $sql, array (), GalleryItem::class );
	}

	/**
	 * Delete record from table
	 * 
	 * @param
	 *        	galleryItem primary key
	 */
	public function delete($gallery_item_seq) {
		// define the statement
		$sql = 'DELETE FROM gallery_item
				WHERE 1=1 
					AND gallery_item_seq = :gallery_item_seq';
		
		// set the bind params
		$bindparams [':gallery_item_seq'] = $gallery_item_seq;
		
		// execute
		return parent::delete ( $sql, $bindparams );
	}

	/**
	 * Insert record to table
	 *
	 * @param
	 *        	GalleryItem galleryItem
	 */
	public function insert($object) {
		// define the statement
		$sql = 'INSERT INTO gallery_item (gallery_item_seq, title, type, content_link, thumbnail_link, description, active)
				VALUES (:gallery_item_seq, :title, :type, :content_link, :thumbnail_link, :description, :active)';
		
		// set the bind params
		$bindparams [':gallery_item_seq'] = $object->getGalleryItemSeq ();
		$bindparams [':title'] = $object->getTitle ();
		$bindparams [':type'] = $object->getType ();
		$bindparams [':content_link'] = $object->getContentLink ();
		$bindparams [':thumbnail_link'] = $object->getThumbnailLink ();
		$bindparams [':description'] = $object->getDescription ();
		$bindparams [':active'] = $object->getActive ();
		
		// execute
		return parent::save ( $sql, $bindparams );
	}

	/**
	 * Update record in table
	 *
	 * @param
	 *        	GalleryItem galleryItem
	 */
	public function update($object) {
		// define the statement
		$sql = 'UPDATE gallery_item SET
					title = :title,
					type = :type,
					content_link = :content_link,
					thumbnail_link = :thumbnail_link,
					description = :description,
					active = :active
				WHERE 1=1
					AND gallery_item_seq = :gallery_item_seq';
		
		// set the bind params
		$bindparams [':gallery_item_seq'] = $object->getGalleryItemSeq ();
		$bindparams [':title'] = $object->getTitle ();
		$bindparams [':type'] = $object->getType ();
		$bindparams [':content_link'] = $object->getContentLink ();
		$bindparams [':thumbnail_link'] = $object->getThumbnailLink ();
		$bindparams [':description'] = $object->getDescription ();
		$bindparams [':active'] = $object->getActive ();
		
		// execute
		return parent::update ( $sql, $bindparams );
	}

	/**
	 * Delete all rows
	 */
	public function clean() {
		$sql = 'DELETE FROM gallery_item';
		return parent::delete ( $sql, array () );
	}

}
