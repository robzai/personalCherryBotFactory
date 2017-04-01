<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagePage extends Application
{
    public function index()
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'managePageView';
        $robots = $this->robots->all();
        //var_dump($robots);
        echo"</br>";
        foreach($robots as $robot){
            $robot->top = $this->parts->getPicByCA($robot->top);
            $robot->torso = $this->parts->getPicByCA($robot->torso);
            $robot->bottom = $this->parts->getPicByCA($robot->bottom);
        }
        //var_dump($robots);
        $this->data['robots'] = $robots;
        $this->data['message'] = "<div></div>";
        $this->data['reboot'] = "<div></div>";
        $this->data['sell'] = "<div></div>";
        $this->render();
    }
    
    
    
    public function register(){
        $this->data['pagebody'] = 'managePageView';
        $pw = $_POST["password"];
        $response = file_get_contents("https://umbrella.jlparry.com/work/registerme/cherry/$pw");
        $pieces = explode(" ", $response);
        $length = sizeof($pieces,0);       
        if($length == 2){
            //4a7ce8
            //register succeed write to database        
            $tkCode = array('id' => '1', 'tokenCode' => $pieces[1]);
            //var_dump($tkCode);
            $this->tokens->update($tkCode);
            $this->data['message'] = "<div>succeed</div>";
        }else{
            //show erroe message
            $this->data['message'] = "<div class='text-danger'>$response</div>";
        }
        $this->data['reboot'] = "<div></div>";
        $this->data['sell'] = "<div></div>";
        $robots = $this->robots->all();
        foreach($robots as $robot){
            $robot->top = $this->parts->getPicByCA($robot->top);
            $robot->torso = $this->parts->getPicByCA($robot->torso);
            $robot->bottom = $this->parts->getPicByCA($robot->bottom);
        }
        $this->data['robots'] = $robots;     
        $this->render();
    }
    
    
    
    public function reboot(){
        $this->data['pagebody'] = 'managePageView';
        $line = (array)$this->tokens->get(1);
        $token = $line['tokenCode'];
        $response = file_get_contents("https://umbrella.jlparry.com/work/rebootme?key=$token");
        $pieces = explode(" ", $response);
        if($pieces[0] == "Ok"){
            //empty your inventory & history
            $this->db->empty_table('parts');
            $this->db->empty_table('histories');
            $this->db->empty_table('robots');
            $this->data['reboot'] = "<div>$response</div>";
        }else{
            //show erroe message
           // $this->data['reboot'] = "<div class='text-danger'> $response </div>";
        }
        $this->data['message'] = "<div></div>";
         $this->data['sell'] = "<div></div>";
        $robots = $this->robots->all();
        foreach($robots as $robot){
            $robot->top = $this->parts->getPicByCA($robot->top);
            $robot->torso = $this->parts->getPicByCA($robot->torso);
            $robot->bottom = $this->parts->getPicByCA($robot->bottom);
        }
        $this->data['robots'] = $robots;    
        $this->render();
    }
    
    
    public function sell(){
        $this->data['pagebody'] = 'managePageView';
        
        if(isset($_POST["index"]) && !empty($_POST["index"])){
            $index = $_POST["index"];
            $rob = $this->robots->get($index);
            $top = $rob->top;
            $torso = $rob->torso;
            $bottom = $rob->bottom;
            
            $line = $this->tokens->get(1);
            $token = $line->tokenCode;
            $response = file_get_contents("https://umbrella.jlparry.com/work/buymybot/$top/$torso/$bottom?key=$token");
        
            //var_dump($response);
            $pieces = explode(" ", $response);
            if($pieces[0] == "Ok"){
                //delete the robot from DB
                $this->db->delete('Robots', array('id' => $index));
                
                //update the history table
                $newHistory = array(
                    'type' => 'Sell',
                    'partstype' => $top."&nbsp;".$torso."&nbsp;".$bottom,
                    'date' => date('Y-m-d H:i:s'),
                    'price' => $pieces[1]
                );
                $this->db->insert("Histories", $newHistory);
                
                $this->data['sell'] = "<div>$response</div>";
            }else{
                //show erroe message
                $this->data['sell'] = "<div class='text-danger'> $response </div>";
            }
            $this->data['message'] = "<div></div>";
            $this->data['reboot'] = "<div></div>";
            $robots = $this->robots->all();
            foreach($robots as $robot){
                $robot->top = $this->parts->getPicByCA($robot->top);
                $robot->torso = $this->parts->getPicByCA($robot->torso);
                $robot->bottom = $this->parts->getPicByCA($robot->bottom);
            }
            $this->data['robots'] = $robots;  
            } 
        $this->render();
    }
}
