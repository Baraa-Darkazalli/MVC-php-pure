<?php


class FdGroup extends Model
{

/////////////Properties and Constructors//////////

    //table name
    private $table='fd_group';
    //connection
    private $conn;


    public function __construct() {
        $this->conn=$this->connect();
    }

///////////////////METHODS///////////////////////

    //get all groups
    public function getGroups()
    {
        //QUERY
        $sql = 'SELECT fdgrp_cd,fddrp_desc FROM '.$this->table;
        return $this->conn->query($sql);
    }
    
    //add new group
    public function add($groupId,$groupName)
    {
        //QUERY
        $sql = 'INSERT INTO '.$this->table." (fdgrp_cd,fddrp_desc) values ('".$groupId."','".$groupName."')";
        return $this->conn->query($sql);
    }
    
    //delete group
    public function delete($groupId)
    {
        //QUERY
        $sql = 'DELETE FROM '.$this->table." WHERE fdgrp_cd = '".$groupId."'";
        return $this->conn->query($sql);
    }
}