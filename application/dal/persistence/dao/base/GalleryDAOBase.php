<?php

namespace website\application\dal\persistence\dao\base;

use website\application\dal\persistence\dao\IGalleryDAO;
use website\application\business\model\Gallery;
use website\application\dal\persistence\core\AbstractDAO;


/**
 * Class that operates on table 'gallery'
 */
class GalleryDAOBase extends AbstractDAO implements IGalleryDAO{

    /**
     * Constructor with optional connection
     */
    public function __construct(PDO $connection = null) {
        parent::__construct(Gallery::class, $connection);
    }

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return Gallery 
	 */
	public function load($gallery_seq){
		// define the statement
		$sql = 'SELECT gallery_seq AS gallerySeq, name AS name, position AS position, active AS active, initial AS initial
				FROM gallery
				WHERE 1=1 
					AND gallery_seq = :gallery_seq';
		
		// set the bind params
		$bindparams[':gallery_seq'] = $gallery_seq;
		
		// execute
		return parent::load($sql, $bindparams);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		// define the statement
		$sql = 'SELECT gallery_seq AS gallerySeq, name AS name, position AS position, active AS active, initial AS initial
				FROM gallery';
		
		// execute
		return parent::executeReadStatement($sql, array(), Gallery::class);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($field){
		// define the statement
		$sql = 'SELECT gallery_seq AS gallerySeq, name AS name, position AS position, active AS active, initial AS initial
				FROM gallery
				ORDER BY ' . $field ;
		
		// execute
		return parent::executeReadStatement($sql, array(), Gallery::class);
	}
	
	/**
 	 * Delete record from table
 	 * @param gallery primary key
 	 */
	public function delete($gallery_seq){
		// define the statement
		$sql = 'DELETE FROM gallery
				WHERE 1=1 
					AND gallery_seq = :gallery_seq';
		
		// set the bind params
		$bindparams[':gallery_seq'] = $gallery_seq;
		
		// execute
		return parent::delete($sql, $bindparams);
	}
	
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Gallery gallery
 	 */
	public function insert($object){
		// define the statement
		$sql = 'INSERT INTO gallery (gallery_seq, name, position, active, initial)
				VALUES (:gallery_seq, :name, :position, :active, :initial)';
		
		// set the bind params
		$bindparams[':gallery_seq'] = $object->getGallerySeq();
		$bindparams[':name'] = $object->getName();
		$bindparams[':position'] = $object->getPosition();
		$bindparams[':active'] = $object->getActive();
		$bindparams[':initial'] = $object->getInitial();

		
		// execute
		return parent::save($sql, $bindparams);
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param Gallery gallery
 	 */
	public function update($object){
		// define the statement
		$sql = 'UPDATE gallery SET
					name = :name,
					position = :position,
					active = :active,
					initial = :initial
				WHERE 1=1
					AND gallery_seq = :gallery_seq';
		
		// set the bind params
		$bindparams[':gallery_seq'] = $object->getGallerySeq();
		$bindparams[':name'] = $object->getName();
		$bindparams[':position'] = $object->getPosition();
		$bindparams[':active'] = $object->getActive();
		$bindparams[':initial'] = $object->getInitial();

		
		// execute
		return parent::update($sql, $bindparams);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM gallery';
		return parent::delete($sql, array());
	}

}
