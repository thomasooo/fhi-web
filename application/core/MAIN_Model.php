<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//MAIN_Model zatial sluzi, aby sa jednoducho aplikoval jazyk v kazdom modeli
class MAIN_Model extends CI_Model {


	public function __construct(){
		parent::__construct();

		//naplnanie premennych aj s prefixom
		//table = realtable //private key
	}
	
}
