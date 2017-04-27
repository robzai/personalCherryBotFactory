<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application
{
    public function index()
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'assemblyView';

        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'your user role is '. $role . '';

        if ($role == "guest" || $role=="worker") {
            $this->data['pagebody'] = 'emptyforrole';
        } else {
            $tops = $this->parts->getType("head");
            $this->data['top'] = $tops;

            $torsos = $this->parts->getType("torso");
            $this->data['torso'] = $torsos;

            $bottoms = $this->parts->getType("bottom");
            $this->data['bottom'] = $bottoms;
        }

        $this->render();
    }

    public function assemble(){
        $this->data['pagebody'] = 'assemblyView';
        $top = 0;
        $torso = 0;
        $bottom = 0;
        // loop over the post parts
        foreach($this->input->post('pick') as $key=>$value) {
            if (substr($value,0,3) == 'top'){
                $top++;
                $topid = substr($value,3);
            }
            if (substr($value,0,5) == 'torso'){
                $torso++;
                $torsoid = substr($value,5);
            }
            if (substr($value,0,6) == 'bottom'){
                $bottom++;
                $bottomid = substr($value,6);
            }
        }
        //check there is one of each needed for a complete bot
        if($top==1 && $torso==1 && $bottom==1){
            $topca = $this->parts->get($topid)->ca;
            $torsoca = $this->parts->get($torsoid)->ca;
            $bottomca = $this->parts->get($bottomid)->ca;

            //add a robot to "robot" table
            $newRobot = array(
                'top' => $topca,
                'torso' => $torsoca,
                'bottom' => $bottomca,
                'toppic' => $this->parts->get($topid)->pic,
                'torsopic' => $this->parts->get($torsoid)->pic,
                'bottompic' => $this->parts->get($bottomid)->pic,
                'date' => date('Y-m-d H:i:s'),
                'price' => 200
            );
            $this->db->insert("Robots", $newRobot);

            //remove the parts from the "parts" table
            $this->db->delete('Parts', array('ca' => $topca));
            $this->db->delete('Parts', array('ca' => $torsoca));
            $this->db->delete('Parts', array('ca' => $bottomca));

            //update the history table
            $newHistory = array(
                'type' => 'Robot Assembly',
                'partstype' => $topca."&nbsp;".$torsoca."&nbsp;".$bottomca,
                //'date' => $torsoca,
                'date' => date('Y-m-d H:i:s'),
                'price' => 0
            );
            $this->db->insert("Histories", $newHistory);
            echo "<script>alert('Robot built successfully!!');";
            echo "window.location.href='/Assembly';</script>";
        }else{
            echo "<script>alert('Warning: Please select one from each part.');";
            echo "window.location.href='/Assembly';</script>";
        }
        $this->render();
    }



}
