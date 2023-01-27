<?php

/*
*
* This class for require view page by two parameters:
* 1-view name and 2-data to be shown in view page
*
*/

class view
{
    public static function load($view_name,$view_data=[])
    {
        $file=VIEWS.$view_name.'.php';
        if(file_exists($file))
        {
            extract($view_data);

            ob_start();
            require($file);
            ob_end_flush();
        }
        else
        {
            //show error view with error message
            View::load('inc/error',['danger'=>'This View: '.$view_name.' Not Exists']);
        }
    }
}