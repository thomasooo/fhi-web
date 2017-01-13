<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Autor: Tomas Ballon
*/
class MAIN_Controller extends CI_Controller {

	public $data;

	public function __construct(){
		parent::__construct();

		$this->data = array();
		$this->load->library('tpl');
		$this->load->config('webdesign/navigation');
		$this->tpl->title(); //donutime nacitat titulok z configu tpl.php

		$this->data['footer_class'] = 'grey-bg';

		$this->data['navigation'] = $this->config->item('webdesign_navigation');
	}

	protected function _active_nav($key = ''){
		$this->data['navigation'] = $this->config->item('webdesign_navigation');
		if(isset($this->data['navigation'][$key])){
			$this->data['navigation'][$key]['active'] = true;
		}
	}
}
