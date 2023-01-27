<?php


class NutData extends Model
{

/////////////Properties and Constructors//////////

    //table name
    private $table='nut_data';
    //connection
    private $conn;


    public function __construct() {
        $this->conn=$this->connect();
    }

///////////////////METHODS///////////////////////

    //get NutData by food id
    public function getNutData($foodId)
    {
        //QUERY
        $sql = 'SELECT nutrdesc,nutr_val FROM '.$this->table." dt JOIN nutr_def df ON dt.nutr_no = df.nutr_no WHERE ndb_no = '".$foodId."'";
        return $this->conn->query($sql);
    }
}