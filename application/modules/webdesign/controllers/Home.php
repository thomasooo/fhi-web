<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends MAIN_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->config('webdesign/webdesign');
	}

	public function homepage(){

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

}
