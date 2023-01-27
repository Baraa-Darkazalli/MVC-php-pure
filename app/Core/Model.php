<?php

/*
*
* This class for connect with database and return connection object
*
*/

class Model
{   
    protected $db;

    //connect with database and return connection object
    public function connect()
    {
        try
        {
            $database = new PDO('pgsql:host='.HOST.';dbname='.DBNAME,USER,PASS);
            $this->db=$database;
            return $this->db;
        }
        catch (PDOException $e)
        {
            //show error view with error message
            View::load('inc/error',['danger'=>'Connection error: '.$e->getMessage()]);
        }
    }
}