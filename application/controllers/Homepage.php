<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */

    public function index(){
		
			$role = $this->session->userdata('userrole');
			if(!isset($role)) {
			    $role = "guest";
                $this->session->set_userdata('userrole','guest');
            }
			$this->data['pagetitle'] = 'this is testing ('. $role . ')';
            
            $this->data['pagebody'] = 'homepage';

            $countPatrs = $this->parts->getNumParts();
            $countBots = $this->robots->getNumBots();
            $countSpent = $this->histories->getSpent();
            $countEarned = $this->histories->getEarned();

            $this->data['parts'] = $countPatrs;
            $this->data['bots'] = $countBots;
            $this->data['spent'] = $countSpent;
            $this->data['earned'] = $countEarned;

            $this->render();


		
	}
}

