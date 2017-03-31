<?php


class Parts extends MY_Model {
    
    public function __construct()
    {
         parent::__construct('Parts', 'id');
    }
	
	// provide form validation rules
    public function rules()
    {
        $config = array(
			['field' => 'id', 'label' => 'ID', 'rules' => 'integer|max_length[8]'],
            ['field' => 'ca', 'label' => 'Certificates', 'rules' => 'string|max_length[8]'],
            ['field' => 'plate', 'label' => 'Manufacturer', 'rules' => 'string|less_than[20]'],
            ['field' => 'type', 'label' => 'Type', 'rules' => 'string|less_than[20]'],
            ['field' => 'date', 'label' => 'Mfg. Date', 'rules' => 'date'],
            ['field' => 'unitprice', 'label' => 'Unit Price', 'rules' => 'integer|less_than[5]'],
			['field' => 'pic', 'label' => 'Picture', 'rules' => 'string|less_than[20]'],
        );
        return $config;
    }
	
	public function getAllParts() {
		return $this->all();
	}
	
	// retrieve a single part's detail
	public function getPartDetail($which)
	{
		$tempParts = array();
		foreach($this->all() as $singlePart) {
			if($singlePart->id == $which) {
				$tempParts = array('pic' => $singlePart->pic, 
								'ca' => $singlePart -> ca,
								'plate' => $singlePart -> plant,
								'type' => $singlePart -> type,
								'date' => $singlePart -> date,
								'unitprice' => $singlePart -> unitprice);
				return $tempParts;
			}
		}
		return null;
	}
	
	public function getPicByCA($which) {
            foreach ($this->all() as $record)
            {
                if ($record->ca == $which){
                    return $record->pic;
                }
            }
            return null;
        
	}
	
	public function getType($which){
        $partArray = array ();
        foreach ($this->all() as $record)
        {
            if ($record->type == $which){
                $partArray[] = array (
                    'pic' => $record->pic,
                    'link' => $record->id );
				return $partArray;
            }
        }
		return null;
        
    }
	
	/*
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
	
	
	var $data = array(
		array('id' => '1', 'CA' => '12234A1', 'pic' => 'a1', 'plant' => 'Apple',
			'date' => '2010-01-01', 'unitprice' => '10', 'type' => 'top'),
		array('id' => '2', 'CA' => '00002A1', 'pic' => 'a1', 'plant' => 'Durian',
			'date' => '2016-01-12', 'unitprice' => '20', 'type' => 'top'),
		array('id' => '3', 'CA' => '06BFB1', 'pic' => 'b1', 'plant' => 'Apple',
			'date' => '2017-01-01', 'unitprice' => '10', 'type' => 'top'),
		array('id' => '4', 'CA' => '7890B2', 'pic' => 'b2', 'plant' => 'Apple',
			'date' => '2016-01-12', 'unitprice' => '7', 'type' => 'torso'),
		array('id' => '5', 'CA' => 'AABB0C2', 'pic' => 'c2', 'plant' => 'Banana',
			'date' => '2016-01-12', 'unitprice' => '5', 'type' => 'torso'),
		array('id' => '6', 'CA' => '3276C3', 'pic' => 'c3', 'plant' => 'Durian',
			'date' => '2016-01-12', 'unitprice' => '8', 'type' => 'bottom'),
		array('id' => '7', 'CA' => 'ABCDC3', 'pic' => 'c3', 'plant' => 'Red Umbrella',
			'date' => '2016-01-12', 'unitprice' => '8', 'type' => 'bottom'),
		array('id' => '8', 'CA' => '0011R1', 'pic' => 'r1', 'plant' => 'Banana',
			'date' => '2016-01-12', 'unitprice' => '9', 'type' => 'top'),
		array('id' => '9', 'CA' => '90062R2', 'pic' => 'r2', 'plant' => 'Running man',
			'date' => '2016-01-12', 'unitprice' => '10', 'type' => 'torso'),
		array('id' => '10', 'CA' => 'ADC23R3', 'pic' => 'r3', 'plant' => 'Red Umbrella',
			'date' => '2016-01-12', 'unitprice' => '20', 'type' => 'bottom'),
		array('id' => '11', 'CA' => '90786W2', 'pic' => 'w2', 'plant' => 'Durian',
			'date' => '2016-01-12', 'unitprice' => '7', 'type' => 'torso'),
		array('id' => '12', 'CA' => 'AD454W3', 'pic' => 'w3', 'plant' => 'Banana',
			'date' => '2016-01-12', 'unitprice' => '12', 'type' => 'bottom')
	);*/
}