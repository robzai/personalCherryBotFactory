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
	public function index()
	{// this is the view we want shown
		$this->data['pagebody'] = 'parts';

		// build the list of authors, to pass on to our view
		$source = $this->parts->all();
		$parts = array ();
		
		foreach ($source as $record)
		{
			$parts[] = array (
                              'pic' => $record['pic'], 
							  'link' => $record['id'],
                             );
		}
		$this->data['id'] = $parts;

		$this->render();
		
	}
	
	public function index(){
            
            // this is the view we want shown
            $this->data['pagebody'] = 'justone';
			
			$parts_num = sizeof($this->parts->all())
			//$robots_num =
			//$spend =
			//$earn = 
            
            $this->data = array_merge($this->data, $this->quotes->get(2));

            $this->render();
    }
	
	
	/*
        
        public function shucks(){
            
            // this is the view we want shown
            $this->data['pagebody'] = 'justone';
            
            $this->data = array_merge($this->data, $this->quotes->get(2));

            $this->render();
        }*/

}
