<?php

namespace website\application\dal\persistence\dao;

/**
 * Interface DAO
 */
interface IGalleryDAO {

	/**
	 * Get Domain object by primry key
	 */
	public function load($gallery_seq);

	/**
	 * Get all records from table
	 */
	public function queryAll();

	/**
	 * Get all records from table ordered by field
	 */
	public function queryAllOrderBy($field);

	/**
	 * Delete record from table
	 */
	public function delete($gallery_seq);

	/**
	 * Insert record to table
	 */
	public function insert($object);

	/**
	 * Update record in table
	 */
	public function update($object);

	/**
	 * Delete all rows
	 */
	public function clean();

}
