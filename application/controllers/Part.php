<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Part extends Application
{
	private $items_per_page = 20;
	//private $responseFromMyBuild = file_get_contents('https://umbrella.jlparry.com/work/mybuilts?key=4a7ce8');
	//private $responseFrom = file_get_contents('https://umbrella.jlparry.com/work/mybuilts?key=4a7ce8');
	
	/**
	 * First for our app
	 */
	public function index()
    {
		$this->data['pagebody'] = 'parts';
        //$this->page(1);
		$records = $this->parts->getAllParts(); // get all the parts
        $finalParts = array(); // start with an empty extract
		$tempParts = array();
		foreach($records as $singlePart) {
			$model = str_split($singlePart->pic)[0];
			$tempParts[] = array('pic' => $singlePart->pic, 
								'link'=> $singlePart->id,
								'line' => $singlePart -> line,
								'model' => strtoupper($model));
		}
		$this->data['id'] = $tempParts;
		$this->render();
    }
	
	public function detail($id)
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'justone';
		
		// build the list of authors, to pass on to our view
		$source = $this->parts->getPartDetail($id);
		$this->data = array_merge($this->data, $source);
		$this->render();
	
	}

	
	public function BuyBoxParts() {
		
		$tokenkey = 'https://umbrella.jlparry.com/work/mybuilts?key='.$this->token->getToken()[0];
		$responseFromMyBuild = file_get_contents($tokenkey);
		$parse_json_array = json_decode($responseFromMyBuilds);
		foreach($parse_json_array as $record) {
			foreach($record as $part) {
				$finalArray[] = array(
//					"pic" => $part["model"].$part["piece"],
//					"ca" => $part["id"];
//					"line"
				);
			}
		}
		
		
	}
        

}
