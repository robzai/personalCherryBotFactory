<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends Application {
	public function showMenuBar() {
		$menu_choices  = array(
			'bossmenu' => array(
				array('name' => 'Home', 'link' => '/'),
				array('name' => 'Parts', 'link' => '/Part'),
				array('name' => 'Assembly', 'link' => '/Assembly'),
				array('name' => 'History', 'link' => '/History'),
				array('name' => 'Manage Page', 'link' => '/ManagePage'),
			),
			'supervisormenu' => array(
				array('name' => 'Home', 'link' => '/'),
				array('name' => 'Parts', 'link' => '/Part'),
				array('name' => 'Assembly', 'link' => '/Assembly')
			),
			'workermenu' => array (
				array('name' => 'Home', 'link' => '/'),
				array('name' => 'Parts', 'link' => '/Part')
			),
			'guestmenu' => array (
				array('name' => 'Home', 'link' => '/')
			)
		);
		
		$role = $this->session->userdata('userrole');
		if($role == ROLE_BOSS) {
			$menubar_url = $this->parser->parse('_boss_menubar', $menu_choices[0] ,true);
		} else if($role == ROLE_SUPERVISOR) {
			$menubar_url = $this->parser->parse('_supervisor_menubar', $menu_choices[1],true);
		} else if($role == ROLE_WORKER) {
			$menubar_url = $this->parser->parse('_supervisor_menubar', $menu_choices[2],true);
		} else {
			$menubar_url = $this->parser->parse('_guest_menubar',$menu_choices[3] ,true);
		}
		
		$this->data['menubar'] = $menubar_url;
	}
	
}