<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Part extends Application
{
	/**
	 * First for our app
	 */
    public function index()
    {

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

        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'this is testing ('. $role . ')';

        if ($role == "guest") {
            $this->data['pagebody'] = 'emptyforrole';
        } else {
            $temp = $this->session->userdata("build");
            //var_dump($temp);
            $this->session->unset_userdata("build");
            if($temp == "fails") {
                $this->data["message"] ="<div class='alert alert-danger'> build fails"."</div>";
            } else if($temp == "suc") {
                $this->data["message"] ="<div class='alert alert-success'>build succeed"."</div>";
            } else{
                $this->data["message"]="<div></div>";
            }

            $temp = $this->session->userdata("purchase");
            //var_dump($temp);
            $this->session->unset_userdata("purchase");
            if($temp == "fails") {
                $this->data["message1"] ="<div class='alert alert-danger'> purchase fails"."</div>";
            } else if($temp == "suc") {
                $this->data["message1"] ="<div class='alert alert-success'>purchase succeed"."</div>";
            } else{
                $this->data["message1"]="<div></div>";
            }

            $this->data['pagebody'] = 'partView';
        }
		$this->render();
    }


    //get a part's detail info
	public function detail($ca)
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'justone';
		// build the list of authors, to pass on to our view
		$source = $this->parts->getPartDetail($ca);
		$this->data = array_merge($this->data, $source);
		$this->render();
	
	}

	//buid parts from main plant
	public function BuildPart() {
        $line = $this->tokens->get(1);
        $token = $line->tokenCode;
        //var_dump($token);
		$tokenkey = "https://umbrella.jlparry.com/work/mybuilds?key=$token";
		//var_dump($tokenkey);
		$response = file_get_contents($tokenkey);
		//var_dump($response);
		if($response == "[]" ) {
            $this->session->set_userdata('build',"fails");
        } else {
            $parse_json_array = json_decode($response);
            //var_dump($parse_json_array);
            $line = "";
            $type = "";
            $finalArray = array();
            $infoArrayforHistiry = array();
            $castr = "";
            foreach ($parse_json_array as $record) {
                $part = get_object_vars($record);
                if (preg_match('/[a-l]/', $part["model"]) === 1) {
                    $line = "household";
                } else if (preg_match('/[m-v]/', $part["model"]) === 1) {
                    $line = "cutler";
                } else if (preg_match('/[w-z]/', $part["model"]) === 1) {
                    $line = "companion";
                }
                var_dump($line);
                if ($part["piece"] == 1) {
                    $type = "head";
                } else if ($part["piece"] == 2) {
                    $type = "torso";
                } else if ($part["piece"] == 3) {
                    $type = "bottom";
                }

                $castr .= $part["id"] . " ";

                $finalArray[] = array(
                    'pic' => $part["model"] . $part["piece"],
                    'ca' => $part["id"],
                    'line' => $line,
                    'unitprice' => 10,
                    'type' => $type,
                    'plant' => $part["plant"],
                    'date' => $part["stamp"]
                );

            }
            //var_dump();

            foreach ($finalArray as $data) {

                $this->db->insert("parts", $data);
            }

            $infoArrayforHistiry[] = array(
                'date' => date("Y-m-d h:m:s", time()),
                'partstype' => $castr,
                'type' => "Build Parts",
                'price' => 0
            );
            $this->db->insert("histories", $infoArrayforHistiry[0]);
            $this->session->set_userdata('build',"suc");
        }
        //$this->render();
        redirect('/part');
	}

	//buy a box of parts from main plant
	public function BuyBoxParts() {

        $line = $this->tokens->get(1);
        $token = $line->tokenCode;
		$tokenkey = "https://umbrella.jlparry.com/work/buybox?key=$token";

		//.$this->token->getToken()["token"];
		$response = file_get_contents($tokenkey);
		if($response == "Oops: you can't afford that!") {
            $this->session->set_userdata('purchase',"fails");
        } else {
            $this->session->set_userdata('purchase',"suc");
            $parse_json_array = json_decode($response);
            $line = "";
            $type = "";
            $finalArray =array();
            $infoArrayforHistiry = array();
            $castr = "";
            var_dump($response);
            foreach($parse_json_array as $record) {

                $part = get_object_vars($record);


                if(preg_match('/[a-l]/',$part['model']) === 1) {
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
        }

		redirect('/part');
	}

}
