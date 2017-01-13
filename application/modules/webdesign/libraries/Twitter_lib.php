<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter_lib {

	protected $CI;

	public function __construct(){
		$this->CI =& get_instance();

		include APPPATH.'modules/webdesign/third_party/TwitterAPIExchange.php';
		$this->CI->load->config('webdesign/twitter');
	}

	public function get_by_hashtag($hashtag = ''){
		if($hashtag == ''){
			return false;
		}
		$url = 'https://api.twitter.com/1.1/search/tweets.json';
		$requestMethod = 'GET';
		$getfield = '?q=#'.$hashtag.'&result_type=recent&lang=en';

		$twitter = new TwitterAPIExchange($this->CI->config->item('webdesign_twitter_settings'));

		$res = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();

		if(!valid_json($res)){
			return false;
		}

		$res = json_decode($res, true);

		if(!isset($res['statuses']) || !is_array($res['statuses'])){
			return false;
		}

		return $res['statuses'];
	}

}
