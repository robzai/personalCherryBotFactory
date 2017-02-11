<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends Application
{
	
	/**
	 * First for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'histories';

		// build the history, to pass on to our view
		$source = $this->histories->all();
		$histories = array ();
		
		foreach ($source as $record)
		{
			$histories[] = array (
                              'transId' => $record['transactionId'], 
							  'type' => $record['type'],
							  'date' => $record['date'], 
							  'price' => ($record['price']),
                             );
		}
		$this->data['id'] = $histories;

		$this->render();
	}   

}
