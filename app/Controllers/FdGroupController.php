<?php


class FdGroupController
{
    
/////////////Properties and Constructors//////////

    //object of FdGroup Model
    private $fdGroupModel;

    public function __construct() {
        $this->fdGroupModel=new FdGroup();
    }

///////////////////METHODS///////////////////////

    //show foods groups table
    public function index($message=[])
    {
        //get groups from database
        $data['groups']=$this->fdGroupModel->getGroups();

        //if there are messages, add them to $data
        $data=array_merge($data,$message);

        //show view
        view::load('FdGroup/index',$data);
    }

    //show form for add new group
    public function showAddView($message=[])
    {
        //show view
        view::load('FdGroup/add',$message);
    }

    //add new food group
    public function add()
    {
        //check if clicked on submit
        if(isset($_POST['submit']))
        {
            //set group name
            $groupName=$_POST['name'];

            //validation for inputs:
            //ID max characters = 4
            if (strlen($_POST['id'])>4)
            {
                $errors=['idErr'=>'ID should not be more than 4 characters'];
            }
            //ID doesn't contain letters
            else if(!is_numeric($_POST['id']))
            {
                //set error message 
                $errors=['idErr'=>'ID should be numeric'];
            }
            //ID doesn't empty or spaces
            else if(empty(trim($_POST['id'])))
            {
                //set error message 
                $errors=['idErr'=>'ID should not be empty'];
            }
            //Name doesn't empty or spaces
            else if(empty(trim($_POST['name'])))
            {
                //set error message 
                $errors=['nameErr'=>'Name should not be empty'];
            }
            //correct
            else
            {
                //set ID syntax '0000'
                //for example if he enter '34' will turn into ' '
                $groupId=sprintf('%04d', $_POST['id']);
            }


            //there is at least one error
            if(!empty($errors))
            {
                //show view with errors
                $this->showAddView($errors);
            }
            else
            {   
                try
                {
                    //add food group to database
                    $this->fdGroupModel->add($groupId,$groupName);

                    //show view with success message
                    $this->index(['success'=>'Data Created Successfully']);
                }
                catch(PDOException $e)
                {
                    //check if error code is for dublicate ID
                    if($e->getCode()==23505)
                    {
                        //show view with error message
                        $this->index(['danger'=>'ID already exists']);
                    }
                    //else show full exception message
                    else
                    {
                        //show view with error message
                        $this->index(['danger'=>'Erorr in add proces: '.$e->getMessage()]);
                    }
                }
            }
        }
    }
    
    //delete food group by id
    public function delete($groupId)
    {
        try 
        {
            //delete group from database
            $this->fdGroupModel->delete($groupId);
            
            //show view with message
            $this->index(['danger'=>'Data Deleted Successfully']);
        }
        catch(PDOException $e)
        {
            //check if error code is for related data
            if($e->getCode()==23503)
            {
                //show view with error message
                $this->index(['danger'=>'There are data in another table related to this record']);
            }
            //else show full exception message
            else
            {
                //show view with error message
                $this->index(['danger'=>$e->getMessage()]);
            }
        }
    }
}