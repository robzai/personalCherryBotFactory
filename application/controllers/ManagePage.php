<?php
//4a7ce8
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagePage extends Application
{
    public function index()
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'managePageView';
        $robots = $this->robots->all();
        foreach($robots as $robot){
            $robot->top = $this->parts->getPciByCa($robot->top);
            $robot->torso = $this->parts->getPciByCa($robot->torso);
            $robot->bottom = $this->parts->getPciByCa($robot->bottom);
        }
        $this->data['robots'] = $robots;
        $this->data['message'] = "<div></div>";
        $this->render();
    }

    public function register(){
        $this->data['pagebody'] = 'managePageView';
        $pw = $_POST["password"];
        $response = file_get_contents("https://umbrella.jlparry.com/work/registerme/cherry/$pw");
        $pieces = explode(" ", $response);
        $length = sizeof($pieces,0);
        //var_dump($length);
        if($length == 2){
            //write to database
            $this->data['message'] = "<div>succeed</div>";
        }else{
            //show erroe message
            $this->data['message'] = "<div class='text-danger'>Incorrect password !!!</div>";
        }
        
        $robots = $this->robots->all();
        $this->data['robots'] = $robots;
        
        $this->render();
    }
}
