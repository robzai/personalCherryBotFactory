<?php

class Robots extends MY_Model {
	
    // Constructor
    public function __construct()
    {
        parent::__construct('robots', 'id');
    }

//    public function count(){
//        return sizeof($this->data);
//    }

//    // retrieve a single quote
//    public function get($which)
//    {
//            // iterate over the data until we find the one we want
//            foreach ($this->data as $record)
//                    if ($record['id'] == $which)
//                            return $record;
//            return null;
//    }
    // retrieve all of the quotes
//    public function all()
//    {
//            return $this->data;
//    }

//    // retrieve first of the quotes
//    public function first()
//    {
//            return $this->data[0];
//    }
//    public function last()
//    {
//        return $this->data[sizeof($this->data)-1];
//    }
}

