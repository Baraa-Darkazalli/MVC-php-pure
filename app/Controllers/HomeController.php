<?php


class HomeController
{

/////////////Properties and Constructors//////////

    //objects for used models
    private $foodDesModel;
    private $nutDataModel;

    //limit of records result
    private $limit=20;

    public function __construct() {
        $this->foodDesModel=new FoodDes();
        $this->foodDesModel->limit=$this->limit;

        $this->nutDataModel=new NutData();
    }

///////////////////METHODS///////////////////////

    //show food desc table
    public function index()
    {
        //set default sort ASC
        $data['sort']='ASC';

        //get foods from database
        $data['foods']=$this->foodDesModel->getFoods();

        //show home view
        view::load('home',$data);
    }


    //search from food desc table
    public function search()
    {
        if(isset($_POST['submit']))
        {
            //get search word
            $serchInput=$_POST['text'];

            //get foods from database by search word
            $data['foods']=$this->foodDesModel->getFoods($serchInput);

            //show home view
            view::load('home',$data);
        }
    }


    //order from food desc table
    public function order($order,$sort)
    {
        //get foods from database with order
        $data['foods']=$this->foodDesModel->getFoods('',$order,$sort);

        //switch sort method
        $data['sort']=$sort=='ASC'?'DESC':'ASC';

        //shoe home view
        view::load('home',$data);
    }

}