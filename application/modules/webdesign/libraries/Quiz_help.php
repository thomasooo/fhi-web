<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_help {

	protected $CI;

	protected $answers;
	protected $current_question;

	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->library('session');

		$this->load_sess();
	}

	public function save_answer($q = 0, $answer = '', $inc_current_q = true){
		if($q == $this->current_question){
			$this->answers[$q] = $answer;
			if($inc_current_q){
				$this->current_question++;
				$this->save_sess();
			}
			return true;
		}
		return false;
	}

	public function get_answers(){
		return $this->answers;
	}

	public function set_initial_question($q = 0){
		$this->current_question = $q; //nastavime o jedu mensie
		$this->save_sess();
		return true;
	}

	public function is_current($q = 0){
		if($q == $this->current_question){
			$this->save_sess();
			return true;
		}
		return false;
	}

	public function get_current(){
		return $this->current_question;
	}

	public function load_sess(){
		if($this->CI->session->has_userdata('q_answers')){
			$this->answers = $this->CI->session->q_answers;
		}else{
			$this->answers = array();
		}

		if($this->CI->session->has_userdata('q_current_question')){
			$this->current_question = $this->CI->session->q_current_question;
		}else{
			$this->current_question = 0;
		}
		return true;
	}

	public function save_sess(){
		$data = array(
			'q_answers' => $this->answers,
			'q_current_question' => $this->current_question
		);

		$this->CI->session->set_userdata($data);
		return true;
	}

	public function reset(){
		$this->answers = array();
		$this->current_question = 0;

		$this->save_sess();
		return true;
	}

}
