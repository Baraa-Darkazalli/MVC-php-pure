<?php


class FoodDes extends Model
{
   
/////////////Properties and Constructors//////////

    //table name
    private $table='food_des';
    //connection
    private $conn;
    //limit of records result
    public $limit=20;


    public function __construct() {
        $this->conn=$this->connect();
    }

///////////////////METHODS///////////////////////

    //get all foods
    public function getFoods($serchInput='',$order='ndb_no',$sort='ASC')
    {
        //QUERY
        $sql = 'WITH getFirst20Records AS (
                SELECT ndb_no,long_desc 
                FROM '.$this->table. 
                ' LIMIT '.$this->limit." 
                )
                select ndb_no,long_desc from getFirst20Records 
                where long_desc like '%".$serchInput."%' 
                ORDER BY ".$order.' '.$sort;
        
        return $this->conn->query($sql);
    }
}