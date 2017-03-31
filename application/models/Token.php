<?php
class Token extends MY_Model {
	public function __construct()
    {
         parent::__construct('Token', 'tokenCode');
    }
	
	public function getToken() {
		
		$tempParts = array();
		foreach($this->all() as $token) {
			$tempParts = array(
				"token" => $token -> tokenCode
			);
		}
		return $tempParts;
	}
}

?>