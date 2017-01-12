<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ajax extends MAIN_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->config('webdesign/webdesign');
	}

	public function answer(){
		$this->load->library('webdesign/quiz_help', null, 'quiz');

		$questions = $this->config->item('webdesign_quiz');
		$possible_answers = array('a', 'b', 'c', 'd');

		$result = array(
			'message' => '',
			'result' => array()
		);

		$q = $this->input->post('qnum');
		$answer = $this->input->post('answer');

		if(!is_numeric($q) || $q < 1 || !in_array($answer, $possible_answers)){
			$result['message'] = 'wrong input data';
			echo json_encode($result);
			exit;
		}

		$last_q = count($questions);

		if(!$this->quiz->is_current($q)){
			$q = $this->quiz->get_current();
		}else{
			$this->quiz->save_answer($q, $answer);
		}

		$q++;
		if($last_q < $q){
			$result['message'] = 'result';
			echo json_encode($result);
			exit;
		}

		unset($questions[$q]['correct']);
		$questions[$q]['number'] = $q;

		$result['message'] = 'question';
		$result['result'] = $questions[$q];

		echo json_encode($result);
		exit;
	}

}
