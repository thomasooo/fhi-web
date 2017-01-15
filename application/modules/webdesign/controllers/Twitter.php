<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//obsah parsovany s twittera
class Twitter extends MAIN_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->config('webdesign/webdesign');
		$this->load->config('webdesign/twitter');
		$this->load->library('webdesign/twitter_lib');
	}

	public function tag($tag = ''){
		if(!in_array($tag, $this->config->item('wedesign_enabled_tags'))){
			redirect('home');
		}

		$feed = $this->twitter_lib->get_formatted_by_hashtag($tag);

		if(!$feed || !is_array($feed)){
			redirect('webdesign/twitter/empty_feed');
		}

		$data = array(
			'feed' => $feed,
			'tag' => $tag
		);

		$this->tpl->add_bootstrap();
		$this->tpl->add_css('webdesign/css/custom.css');
		$this->tpl->add_css('webdesign/css/twitter.css');
		$this->tpl->add_css('plugins/scroll-effects/animate.css');
		$this->tpl->add_js_src('plugins/scroll-effects/viewportchecker.js', true);
		$this->tpl->add_js_src('webdesign/js/twitter_tag.js', true);

		$this->_active_nav($tag);
		$this->load->view('header', $this->data);
		$this->load->view('webdesign/twitter/tag', $data);
		$this->load->view('footer');
	}

	public function empty_feed(){
		$this->tpl->add_bootstrap();
		$this->tpl->add_css('webdesign/css/custom.css');
		$this->tpl->add_css('webdesign/css/twitter.css');

		$this->load->view('header', $this->data);
		$this->load->view('webdesign/twitter/empty_feed');
		$this->load->view('footer');
	}

}
