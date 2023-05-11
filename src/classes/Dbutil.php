<?php

include "Config.php";

/**
 * Summary of Dbutitl
 */
class Dbutil extends Exception implements Throwable {

    /**
     * Summary of con
     * @var 
     */
    private $con;

    /**
     * Summary of dbLink
     * @return PDO
     */
    public function dbLink() : PDO  {
        
        try {
            $this->con = new PDO(DSN,USER,PASS,OPT);
            return $this->con;
        } catch (Throwable $th) {
            //handle errro
            throw new Dbutil("PDO Error: " . $th->getMessage(), $th->getCode(), $th);
        }

    }

    /**
     * Summary of killLink
     * @return void
     */
    public function killLink() : void {
        $this->con = null;
    }

}