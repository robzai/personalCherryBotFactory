<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagePage extends Application
{
    public function index()
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'managePageView';
        $tops = $this->robots->all();
        $this->data['top'] = $tops;
        $this->render();
    }

    public function register(){
        $pw = $_POST["password"];
        var_dump($pw);
    }
}
