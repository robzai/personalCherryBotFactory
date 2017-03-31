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
								'link'=> $singlePart->ca,
								'line' => $singlePart -> line,
								'model' => strtoupper($model));
		}
		$this->data['id'] = $tempParts;
		$this->render();
    }
	
	public function detail($ca)
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'justone';
		
		// build the list of authors, to pass on to our view
		$source = $this->parts->getPartDetail($ca);
		$this->data = array_merge($this->data, $source);
		$this->render();
	
	}

	
	public function BuyBoxParts() {
		
		$tokenkey = 'https://umbrella.jlparry.com/work/buybox?key=40063f';
		//.$this->token->getToken()["token"];
		$response = file_get_contents($tokenkey);
		$parse_json_array = json_decode($response);
		$line = "";
		$type = "";
		$finalArray =array();
		$infoArrayforHistiry = array();
		$castr = "";
		//var_dump($this ->parts->getLastId());
		foreach($parse_json_array as $record) {
			
			$part = get_object_vars($record);
			
			
			if(preg_match('[/[a-l]/]',$part['model']) === 1) {
				$line = "household";
			} else if(preg_match('/[m-v]/',$part['model']) === 1) {
				$line = "cutler";
			} else if(preg_match('/[w-z]/',$part['model']) === 1) {
				$line = "companion";
			} 
				
			if($part["piece"] == 1) {
				$type = "head";
			} else if ($part["piece"] == 2) {
				$type = "torso";
			} else if ($part["piece"] == 3) {
				$type = "bottom";
			}
			
			$castr .= $part["id"]." ";
			
			$finalArray[] = array(
				'pic' => $part["model"].$part["piece"],
				'ca' => $part["id"],
				'line' => $line,
				'unitprice' => 10,
				'type' => $type,
				'plant' => $part["plant"],
				'date' => $part["stamp"]
			);
			
			
			
			//$this->parts->insertParts($finalArray);
				//echo $part["model"].$part["piece"];
		}
		
		foreach($finalArray as $data) {
			
			$this->db->insert("parts", $data);
		}

		$infoArrayforHistiry[] = array(
			'date' => date("Y-m-d h:m:s", time()),
			'partstype' => $castr,
			'type' => "Purchased Box",
			'price' => 100
		);
		$this -> db -> insert("histories", $infoArrayforHistiry[0]);
		redirect('/part');
	}
        

}
