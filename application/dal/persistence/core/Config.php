<?php

namespace website\application\dal\persistence\core;

class Config {
	
	// local
	private $local_user = "root";
	private $local_password = "";
	private $local_dbname = "d01d52d7";
	private $local_host = "localhost";
	
	// test
	public $test_user = "d01d52d7";
	public $test_password = "kN4fmmwJknExtmtg";
	public $test_dbname = "d01d52d7";
	public $test_host = "localhost"; // = "test.raumklang-band.at";
	
	// prod
	public $prod_user = "d01d4efb";
	public $prod_password = "R6z2wTykSFdprfoL";
	public $prod_dbname = "d01d4efb";
	public $prod_host = "localhost"; // = "raumklang-band.at";

	public function getUser() {
        if (strpos($_SERVER ['HTTP_HOST'], 'test.raumklang-band.at') !== false ) {
			return $this->test_user;
		} else if (strpos($_SERVER ['HTTP_HOST'], 'raumklang-band.at') !== false) {
			return $this->prod_user;
		} else  {
            return $this->local_user;
        }
	}

	public function getPassword() {
        if (strpos($_SERVER ['HTTP_HOST'], 'test.raumklang-band.at') !== false ) {
            return $this->test_password;
        } else if (strpos($_SERVER ['HTTP_HOST'], 'raumklang-band.at') !== false) {
            return $this->prod_password;
        } else  {
            return $this->local_password;
        }
	}

	public function getDbname() {
        if (strpos($_SERVER ['HTTP_HOST'], 'test.raumklang-band.at') !== false ) {
            return $this->test_dbname;
        } else if (strpos($_SERVER ['HTTP_HOST'], 'raumklang-band.at') !== false) {
            return $this->prod_dbname;
        } else  {
            return $this->local_dbname;
        }
	}

	public function getHost() {
        if (strpos($_SERVER ['HTTP_HOST'], 'test.raumklang-band.at') !== false ) {
            return $this->test_host;
        } else if (strpos($_SERVER ['HTTP_HOST'], 'raumklang-band.at') !== false) {
            return $this->prod_host;
        } else  {
            return $this->local_host;
        }
		return null;
	}

}