<?php

class Robots extends MY_Model {
	
    // Constructor
    public function __construct()
    {
        parent::__construct('robots', 'id');
    }



        //used to get total number of robots in homepage
        public function getNumBots(){
            return sizeof($this->all());
        }

        /*
    //retrieve part's pic by ca
    public function getPicByCA($which) {
        foreach ($this->all() as $record)
        {
            if ($record->ca == $which){
                return $record->pic;
            }
        }
        return null;

    }*/


    //retrieve robot's top pic by ca
    public function getTopByCA($which) {
        foreach ($this->all() as $record)
        {
            if ($record->top == $which){
                return $record->toppic;
            }
        }
        return null;

    }
    //retrieve robot's torso pic by ca
    public function getTorsoByCA($which) {
        foreach ($this->all() as $record)
        {
            if ($record->torso == $which){
                return $record->torsopic;
            }
        }
        return null;

    }
    //retrieve robot's bottom pic by ca
    public function getBottomByCA($which) {
        foreach ($this->all() as $record)
        {
            if ($record->bottom == $which){
                return $record->bottompic;
            }
        }
        return null;

    }

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

