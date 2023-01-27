<?php


class NutDataController
{
    
/////////////Properties and Constructors//////////

    //objects for used models
    private $nutDataModel;

    public function __construct() {
        $this->nutDataModel=new NutData();
    }

///////////////////METHODS///////////////////////

    //show NutData by food id
    public function showNutData($foodId,$foodName)
    {
        //get NutData by food id
        $data['nutData']=$this->nutDataModel->getNutData($foodId);

        //set food name
        $data['FoodName']=$foodName;

        //show NutData view
        view::load('NutData/index',$data);
    }
    
}