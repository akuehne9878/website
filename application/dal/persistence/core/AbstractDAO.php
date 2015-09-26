<?php

namespace website\application\dal\persistence\core;

use \PDO;
use Commons\utils\Logger;
use website\application\dal\persistence\core\Config;

abstract class AbstractDAO
{
    private $connection;
    private $classname;

    /**
     */
    public function __construct($classname, PDO $connection = null)
    {
        $this->classname = $classname;
        $this->connection = $connection;
        if ($this->connection === null) {
            $this->connection = $this->getConnection();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }



    /**
     * returns a connection to the db
     */
    public function getConnection() {
        ini_set('mysql.connect_timeout', 300);
        ini_set('default_socket_timeout', 300);

        $config = new Config();

        $dsn = 'mysql:host=' . $config->getHost() . ';dbname=' . $config->getDbname() . ';charset=utf8';
        $user = $config->getUser();
        $password = $config->getPassword();

        $dbh = new PDO ($dsn, $user, $password, array(
            PDO::ATTR_PERSISTENT => true
        ));
        return $dbh ;
    }

    /**
     * READ ACCESS: returns list of objects
     */
    private function readObjects($sql, $bindparams, $classname = null)
    {
        Logger::log("++++++++");
        Logger::log("EXECUTING SQL: " . $sql);
        $stmt = $this->connection->prepare($sql);
        Logger::log("++++++++");
        foreach ($bindparams as $key => &$value) {
            $stmt->bindParam($key, $value);
            Logger::log("BIND PARAM: " . $key . "=" . $value);
        }

        $stmt->execute();


        if ($classname) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, $classname);
        } else {
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->classname);
        }

        $ret = $stmt->fetchAll();

        Logger::log("++++++++");
        Logger::log("RESULT: " . print_r($ret, true));
        Logger::log("++++++++");

        return $ret;
    }

    /**
     * READ ACCESS: returns one object
     */
    private function readFirstObject($sql, $bindparams, $classname = null)
    {
        Logger::log("++++++++");
        Logger::log("EXECUTING SQL: " . $sql);
        $stmt = $this->connection->prepare($sql);
        Logger::log("++++++++");
        foreach ($bindparams as $key => &$value) {
            $stmt->bindParam($key, $value);
            Logger::log("BIND PARAM: " . $key . "=" . $value);
        }

        $stmt->execute();
        if ($classname) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, $classname);
        } else {
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->classname);
        }

        $ret = $stmt->fetch();
        Logger::log("++++++++");
        Logger::log("RESULT: " . print_r($ret, true));
        Logger::log("++++++++");
        return $ret;
    }

    /**
     * WRITE ACCESS
     */
    private function writeObject($sql, $bindparams)
    {
        Logger::log("++++++++");
        Logger::log("EXECUTING SQL: " . $sql);
        Logger::log("++++++++");
        try {

            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare($sql);

            foreach ($bindparams as $key => &$value) {
                $stmt->bindParam($key, $value);
                Logger::log("BIND PARAM: " . $key . "=" . $value);
            }
            $ret = $stmt->execute();
            $this->connection->commit();
            Logger::log("++++++++");
            Logger::log("RESULT: " . print_r($ret, true));
            Logger::log("++++++++");
        } catch (Exception $e) {
            $this->connection->rollBack();
        }
        return $ret;
    }

    /**
     */
    protected function load($sql, $bindparams)
    {
        return $this->readFirstObject($sql, $bindparams);
    }

    /**
     */
    protected function save($sql, $bindparams)
    {
        return $this->writeObject($sql, $bindparams);
    }

    /**
     */
    protected function update($sql, $bindparams)
    {
        return $this->writeObject($sql, $bindparams);
    }

    /**
     */
    protected function delete($sql, $bindparams)
    {
        return $this->writeObject($sql, $bindparams);
    }

    protected function executeReadStatement($sql, $bindparams, $classname = null)
    {
        return $this->readObjects($sql, $bindparams, $classname);
    }

    protected function executeWriteStatement($sql, $bindparams)
    {
        return $this->writeObject($sql, $bindparams);
    }

}

?>