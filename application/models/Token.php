<?php
class Token extends MY_Model {
	public function __construct()
    {
         parent::__construct('Toke', 'tokenCode');
    }
	
	public function getToke() {
		return $this->first();
	}
}

?>