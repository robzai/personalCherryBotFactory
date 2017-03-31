<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagePage extends Application
{
    public function index()
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'managePageView';
        $robots = $this->robots->all();
        foreach($robots as $robot){
            $robot->top = $this->parts->getPicByCA($robot->top);
            $robot->torso = $this->parts->getPicByCA($robot->torso);
            $robot->bottom = $this->parts->getPicByCA($robot->bottom);
        }
        $this->data['robots'] = $robots;
        $this->data['message'] = "<div></div>";
        $this->data['reboot'] = "<div></div>";
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
            //4a7ce8
            //write to database
            
            $tkCode = array('id' => '1', 'tokenCode' => $pieces[1]);
            //var_dump($tkCode);
            $this->token->update($tkCode);
            
            $this->data['message'] = "<div>succeed</div>";
        }else{
            //show erroe message
            $this->data['message'] = "<div class='text-danger'>Incorrect password !!!</div>";
        }
        $this->data['reboot'] = "<div></div>";
        $robots = $this->robots->all();
        $this->data['robots'] = $robots;       
        $this->render();
    }
    
    public function reboot(){
        $this->data['pagebody'] = 'managePageView';
        $response = file_get_contents("https://umbrella.jlparry.com//work/rebootme??key=YOUR_API_KEY");
        $pieces = explode(" ", $response);
        //$length = sizeof($pieces,0);
        //var_dump($length);
        if($pieces[0] == "Ok"){
            //write to database
            $this->data['reboot'] = "<div>succeed</div>";
        }else{
            //show erroe message
            $this->data['reboot'] = "<div class='text-danger'> $response </div>";
        }
        $this->data['message'] = "<div></div>";
        $robots = $this->robots->all();
        $this->data['robots'] = $robots;       
        $this->render();
    }
}
