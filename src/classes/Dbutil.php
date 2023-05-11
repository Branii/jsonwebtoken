<?php

include "Config.php";

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
     * @return PDO
     */
    public function dbLink() : PDO  {
        
        try {
            $this->con = new PDO(DSN,USER,PASS,OPT);
            return $this->con;
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
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