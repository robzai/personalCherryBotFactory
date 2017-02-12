<?php


class Parts extends CI_Model {
	
	var $data = array(
		array('id' => '1', 'CA' => '09AFB6', 'pic' => 'parts/a1.jpeg', 'plant' => 'Apple',
			'date' => '2010-01-01', 'unitprice' => '10', 'type' => 'top'),
		array('id' => '2', 'CA' => '000000', 'pic' => 'parts/a1.jpeg', 'plant' => 'Durian',
			'date' => '2016-01-12', 'unitprice' => '20', 'type' => 'top'),
		array('id' => '3', 'CA' => '06BFB6', 'pic' => 'parts/b1.jpeg', 'plant' => 'Apple',
			'date' => '2017-01-01', 'unitprice' => '10', 'type' => 'top'),
		array('id' => '4', 'CA' => '789034', 'pic' => 'parts/b2.jpeg', 'plant' => 'Apple',
			'date' => '2016-01-12', 'unitprice' => '7', 'type' => 'torso'),
		array('id' => '5', 'CA' => 'AABB900', 'pic' => 'parts/c2.jpeg', 'plant' => 'Banana',
			'date' => '2016-01-12', 'unitprice' => '5', 'type' => 'torso'),
		array('id' => '6', 'CA' => '327612', 'pic' => 'parts/c3.jpeg', 'plant' => 'Durian',
			'date' => '2016-01-12', 'unitprice' => '8', 'type' => 'bottom'),
		array('id' => '7', 'CA' => 'ABCDEF', 'pic' => 'parts/c3.jpeg', 'plant' => 'Red Umbrella',
			'date' => '2016-01-12', 'unitprice' => '8', 'type' => 'bottom'),
		array('id' => '8', 'CA' => '001122', 'pic' => 'parts/r1.jpeg', 'plant' => 'Banana',
			'date' => '2016-01-12', 'unitprice' => '9', 'type' => 'top'),
		array('id' => '9', 'CA' => '9006732', 'pic' => 'parts/r2.jpeg', 'plant' => 'Running man',
			'date' => '2016-01-12', 'unitprice' => '10', 'type' => 'torso'),
		array('id' => '10', 'CA' => 'ADC2324', 'pic' => 'parts/r3.jpeg', 'plant' => 'Red Umbrella',
			'date' => '2016-01-12', 'unitprice' => '20', 'type' => 'bottom'),
		array('id' => '11', 'CA' => '9078675', 'pic' => 'parts/w2.jpeg', 'plant' => 'Durian',
			'date' => '2016-01-12', 'unitprice' => '7', 'type' => 'torso'),
		array('id' => '12', 'CA' => 'AD4520', 'pic' => 'parts/w3.jpeg', 'plant' => 'Banana',
			'date' => '2016-01-12', 'unitprice' => '12', 'type' => 'bottom')
	);
	// Constructor
	public function __construct()
	{
		parent::__construct();
	}
	
	// retrieve a single quote
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	public function count(){
        return sizeof($this->data);
    }

	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}
	
	// retrieve first of the quotes
	public function first()
	{
		return $this->data[0];
	}
    public function last()
    {
        return $this->data[sizeof($this->data)-1];
    }

    public function getType($which){
        $partArray = array ();
        foreach ($this->data as $record)
        {
            if ($record['type'] == $which){
                $partArray[] = array (
                    'pic' => $record['pic'],
                    'link' => $record['id'] );
            }
        }
        return $partArray;


    }
}