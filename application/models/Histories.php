<?php


class Histories extends CI_Model {
	
	var $data = array(
		array('transactionId' => '1', 'type' => 'Purchase', 'date' => '10:30pm April 15 2014', 'price' => 100),
		array('transactionId' => '2', 'type' => 'Purchase', 'date' => '08:30pm April 17 2014', 'price' => 200),
		array('transactionId' => '3', 'type' => 'Purchase', 'date' => '07:30pm April 12 2014', 'price' => 300),
		array('transactionId' => '4', 'type' => 'Purchase', 'date' => '06:30pm April 11 2014', 'price' => 400),
		array('transactionId' => '5', 'type' => 'Assembly', 'date' => '05:30pm April 15 2014', 'price' => 0),
		array('transactionId' => '6', 'type' => 'Assembly', 'date' => '04:30pm April 19 2014', 'price' => 0),
		array('transactionId' => '7', 'type' => 'Assembly', 'date' => '03:30pm April 21 2014', 'price' => 0),
		array('transactionId' => '8', 'type' => 'Assembly', 'date' => '05:30am April 20 2014', 'price' => 0),
		array('transactionId' => '9', 'type' => 'Shipment', 'date' => '07:30am April 23 2014', 'price' => 100),
		array('transactionId' => '10', 'type' => 'Shipment', 'date' => '03:30am April 11 2014', 'price' => 400),
		array('transactionId' => '11', 'type' => 'Shipment', 'date' => '05:30am April 28 2014', 'price' => 200),
		array('transactionId' => '12', 'type' => 'Shipment', 'date' => '06:30am April 29 2014', 'price' => 100)
	);
	
	// Constructor
	public function __construct()
	{
		parent::__construct();
	}
	
	// retrieve a single transaction
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['transactionId'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the transactions
	public function all()
	{
		return $this->data;
	}
	
	// retrieve the total amount of money spent
	public function getSpent()
	{
		$totalSpent = 0;

		foreach ($this->data as $record) 
		{
			if ($record['type'] == "Purchase") 
			{
				$totalSpent += $record['price'];
			}
		}
		return $totalSpent;
	}

	// retrieve the total amount of money earned
	public function getEarned()
	{
		$totalEarned = 0;

		foreach ($this->data as $record) 
		{
			if ($record['type'] == "Shipment") 
			{
				$totalEarned += $record['price'];
			}
		}
		return $totalEarned;
	}
}