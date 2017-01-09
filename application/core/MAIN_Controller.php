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
		$this->tpl->title(); //donutime nacitat titulok z configu tpl.php
	}

}
