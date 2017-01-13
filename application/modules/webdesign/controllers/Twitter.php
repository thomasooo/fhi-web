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

		$feed = $this->twitter_lib->get_by_hashtag($tag);

		if(!$feed || !is_array($feed)){
			redirect('webdesign/twitter/empty_feed');
		}
debug($feed);
		foreach($feed as $f){
			echo "Time and Date of Tweet: ".$f['created_at']."<br />";
			echo "Tweet: ". $f['text']."<br />";
			echo "Tweeted by: ". $f['user']['name']."<br />";
			echo "Screen name: ". $f['user']['screen_name']."<br />";
			echo "Followers: ". $f['user']['followers_count']."<br />";
			echo "Friends: ". $f['user']['friends_count']."<br />";
			echo "Listed: ". $f['user']['listed_count']."<br /><hr />";
			echo "User url: ". $f['user']['url']."<br /><hr />";
			echo "BG: <img src=\"". $f['user']['profile_background_image_url']."\" /><br /><hr />";
			echo "Profile: <img src=\"". $f['user']['profile_image_url']."\" /><br /><hr />";
			if(isset($f['entities']['media'][0]['media_url'])){
				echo "Media: <img src=\"". $f['entities']['media'][0]['media_url']."\" /><br /><hr />";
			}

		}
	}

	public function empty_feed(){
		//TODO

		debug('NEPODARILO SA ZISKAT ZAZNAMY', true);
	}

}
