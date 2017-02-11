<?php

class Robot extends CI_Model {
	
    var $data = array(
        array('id' => '1', 'top' => '1', 'torso' => '9', 'bottom' => '6', 'pic' => 'bots/a.jpeg', 
                'date' => '', 'unitprice' => ''),
        array('id' => '2', 'top' => '2', 'torso' => '4', 'bottom' => '7', 'pic' => 'bots/b.jpeg', 
                'date' => '', 'unitprice' => ''),
        array('id' => '3', 'top' => '3', 'torso' => '5', 'bottom' => '10', 'pic' => 'bots/c.jpeg', 
                'date' => '', 'unitprice' => '')
           
    );
    // Constructor
    public function __construct()
    {
            parent::__construct();
    }

    public function count(){
        return sizeof($this->data);
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
}

