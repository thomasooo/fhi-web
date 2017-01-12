<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends MAIN_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->config('webdesign/webdesign');

		$this->data['footer_class'] = 'grey-bg';
	}

	public function homepage(){
		$this->data['footer_class'] = ''; //odstranenie grey class z footera

		$data = array(
			'video' => $this->config->item('webdesign_homepage_video')
		);

		$this->tpl->add_bootstrap();
		$this->tpl->add_css('webdesign/css/homepage_player.css');
		$this->tpl->add_css('webdesign/css/custom.css');
		$this->tpl->add_js_src('plugins/YTPlayer/jquery.mb.YTPlayer.js', true);
		$this->tpl->add_js('$(document).ready(function () { $(".player").mb_YTPlayer(); });', true);

		$this->load->view('header', $this->data);
		$this->load->view('webdesign/home/homepage', $data);
		$this->load->view('footer');
	}

	public function quiz(){
		$this->load->library('webdesign/quiz_help', null, 'quiz');

		$this->quiz->reset();
		$this->quiz->set_initial_question(1);

		$questions = $this->config->item('webdesign_quiz');

		$data = array(
			'q' => $questions[1]
		);

		$this->tpl->add_bootstrap();
		$this->tpl->add_css('webdesign/css/custom.css');
		$this->tpl->add_css('webdesign/css/quiz.css');
		$this->tpl->add_js_src('webdesign/js/quiz.js', true);
		$this->tpl->add_js("var ajax_quiz_url = '".site_url('webdesign/ajax/answer')."', quiz_result_url = '".site_url('webdesign/home/quiz_result')."';", true);

		$this->load->view('header', $this->data);
		$this->load->view('webdesign/home/quiz', $data);
		$this->load->view('footer');
	}

	public function quiz_result(){
		$this->load->library('webdesign/quiz_help', null, 'quiz');

		$questions = $this->config->item('webdesign_quiz');
		$last_q = count($questions);

		if($last_q != ($this->quiz->get_current() - 1)){
			debug('fail', true);
			//TODO error
		}

		$result = $this->quiz->get_answers();

		debug($result, true);
	}

}
