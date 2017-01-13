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
		$getfield = '?q=#'.$hashtag.'&result_type=mixed&lang=en';

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

	public function get_formatted_by_hashtag($hashtag = ''){
		$feed = $this->get_by_hashtag($hashtag);

		if(!$feed || !is_array($feed)){
			return false;
		}

		$res = array();
		foreach($feed as $f){
			$data = array(
				'created_at' => strtotime($f['created_at']),
				'tweet' => $f['text'],
				'tweet_id' => $f['id'],
				'media' => false,
				'urlname' => $f['user']['screen_name'],
				'username' => $f['user']['name'],
				'followers_count' => $f['user']['followers_count'],
				'friends_count' => $f['user']['friends_count'],
				'listed_count' => $f['user']['listed_count'],
				'user_url' => $f['user']['url'],
				'user_profile_image' => $f['user']['profile_image_url'],
				'user_profile_background_image' => $f['user']['profile_background_image_url'],
			);

			if(isset($f['entities']['media'][0]['media_url'])){
				$data['media'] = $f['entities']['media'][0]['media_url'];
			}

			$res[] = $data;
		}

		return $res;
	}

}
