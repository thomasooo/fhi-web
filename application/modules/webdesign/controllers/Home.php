<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends MAIN_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->config('webdesign/webdesign');
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
			'q' => $questions[1] //inicializacia - vykreslenie prvej otazky
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

		//vygeneruje vysledok kvizu
		$result = $this->quiz->generate_result($questions);
		if(!$result || !is_array($result)){
			//pri faile redirectne na quiz
			redirect('webdesign/home/quiz');
		}

		$data = array(
			'result' => $result
		);

		$this->tpl->add_bootstrap();
		$this->tpl->add_css('webdesign/css/custom.css');
		$this->tpl->add_css('webdesign/css/quiz.css');
		$this->tpl->add_js_src('webdesign/js/quiz_result.js', true);
		$this->tpl->add_js("var ajax_send_email_url = '".site_url('webdesign/ajax/send_mail')."';", true);

		$this->load->view('header', $this->data);
		$this->load->view('webdesign/home/quiz_result', $data);
		$this->load->view('webdesign/modals/send_mail');
		$this->load->view('webdesign/modals/message');
		$this->load->view('footer');
	}

	public function export_csv(){
		$this->load->library('webdesign/quiz_help', null, 'quiz');
		$questions = $this->config->item('webdesign_quiz');

		//vygeneruje vysledok kvizu
		$result = $this->quiz->generate_result($questions);
		if(!$result || !is_array($result)){
			//pri faile redirectne na quiz
			redirect('webdesign/home/quiz');
		}

		$out = fopen('php://output', 'w');

		$data = array(
			'OTÁZKA',
			'MOŽNÉ ODPOVEDE',
			'TVOJA ODPOVEĎ',
			'SPRÁVNA ODPOVEĎ',
			'VÝSLEDOK'
		);

		fprintf($out, chr(0xEF).chr(0xBB).chr(0xBF)); //UTF-8
		fputcsv($out, $data);

		foreach($result['results'] as $k => $v){
			$correct = 'NESPRÁVNE';
			if($v['your_answer'] == $v['correct_answer']){
				$correct = 'SPRÁVNE';
			}

			$data = array(
				$k.'. '.$v['question'],
				'a. '.$v['answers']['a']."\n".'b. '.$v['answers']['b']."\n".'c. '.$v['answers']['c']."\n".'d. '.$v['answers']['d']."\n",
				$v['your_answer'].'. '.$v['answers'][$v['your_answer']],
				$v['correct_answer'].'. '.$v['answers'][$v['correct_answer']],
				$correct
			);

			fputcsv($out, $data);
		}

		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename="result_'.date("Y-m-d_H:i:s").'.csv";');
		fpassthru($out);
		fclose($out);
		exit;
	}

}
