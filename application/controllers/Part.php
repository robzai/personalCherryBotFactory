<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Part extends Application
{
	
	/**
	 * First for our app
	 */
	public function index()
	{
		// this is the view we want shown
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
	
	public function detail($id)
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'justone';
		
		// build the list of authors, to pass on to our view
		$source = $this->parts->get($id);
		$this->data = array_merge($this->data, $source);
		$this->render();
	
	}
        

}
