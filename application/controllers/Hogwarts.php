<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hogwarts extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */

    public function index(){
            
            $this->data['pagebody'] = 'homepage';
            
            $data = array();
            $countPatrs = $this->parts->count();
            $countBots = $this->robot->count();
            $countSpent = $this->histories->getSpent();
            $countEarned = $this->histories->getEarned();
            $data = array('parts'=> $countPatrs, 'bots' => $countBots, 'spent' => $countSpent
                , 'earned' => $countEarned);
            $this->data = array_merge($this->data, $data);
            $this->render();
		
	}
}

