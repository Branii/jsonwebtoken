<?php

include "config.php";

/**
 * Summary of Dbutitl
 */
class Dbutitl {

    /**
     * Summary of con
     * @var 
     */
    private $con;

    /**
     * Summary of dbLink
     * @return PDO|false
     */
    public function dbLink () : PDO  {
        
        try {
            $this->con = new PDO(DSN,USER,PASS,OPT);
            return $this->con;
        } catch (\Throwable $th) {
            //throw $th;
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