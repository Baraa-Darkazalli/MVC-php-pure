<?php

/*
*
* This class first of all for check connection with database
* then extract controller,method,parameters from URL
* then create object for controller and call method
*
*/

class App
{
    //database connection
    protected $database;

    //defulat contorller and method and parameters
    protected $controller='HomeController';
    protected $method='index';
    protected $params=[];
    
    
    
    public function __construct()
    {
        //check database connection
        $this->conn=new Model();
        if(null !== $this->conn->connect())
        {
            $this->prepareURL();
            $this->render();
        }
    }




    //extract controller,method,parameters from URL
    public function prepareURL()
    {
        $url=$_SERVER['QUERY_STRING'];

        if(!empty($url)){
            $url=trim($url,'/');
            $url=explode('/',$url);

            //define controller
            $this->controller = isset($url[0]) ? ucwords($url[0]).'Controller':'HomeController';

            //define method 
            $this->method = isset($url[1]) ? $url[1]:'index';

            //define parameters 
            unset($url[0],$url[1]);
            $this->params = !empty($url) ? array_values($url) : [];

        }
    }

    //create object for controller and call method
    public function render()
    {
        if(class_exists($this->controller))
        {
            //create controller object
            $controller=new $this->controller;
            
            if(method_exists($controller,$this->method))
            {
                //call method object
                call_user_func_array([$controller,$this->method],$this->params);
            }
            else
            {
                //show error view with error message
                View::load('inc/error',['danger'=>'This Method: '.$this->method.' Not Exists']);
            }
        }
        else
        {
            //show error view with error message
            View::load('inc/error',['danger'=>'This Controller: '.$this->controller.' Not Exists']);
        }
    }
}