<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	//funkcia na formatovanie casu z unixtime
	function format_time($unixtime = 0, $gmt = false){
		if(is_numeric($unixtime)){
			if($gmt){
				return gmdate('d.m.Y H:i:s', $unixtime);
			}else{
				return date('d.m.Y H:i:s', $unixtime);
			}
		}
		return '';
	}
	
	//funkcia na formatovanie datumu z unixtime
	function format_date($unixtime = 0, $gmt = false){
		if(is_numeric($unixtime)){
			if($gmt){
				return gmdate('d.m.Y', $unixtime);
			}else{
				return date('d.m.Y', $unixtime);
			}
		}
		return '';
	}
	
	function format_time_to_iso8601($unixtime = 0, $shorten = false){
		if(!is_numeric($unixtime)){
			if($shorten){
				return substr(date('c', 0), 0, 10);
			}
			return date('c', 0);
		}
		if($shorten){
			return substr(date('c', $unixtime), 0, 10);
		}
		return date('c', $unixtime);
	}
	
	function is_image($path = ''){
		$path = remove_bad_string_nomethod($path);
		
		if(exif_imagetype($path)){
			return true;
		}
		return false;
	}
	
	//funkcia na formatovanie datumu do unixtime (format d.m.Y)
	function date_to_unixtime($date = ''){
		if($date != ''){
			return strtotime($date);
		}
		return time();
	}
	
	//skontroluje, ci je datum spravne formatovany (format d.m.Y)
	function date_has_correct_format($date = ''){
		if(strlen($date) == 10){
			if(is_numeric($date[0].$date[1]) && is_numeric($date[3].$date[4]) && is_numeric($date[6].$date[7].$date[8].$date[9]) && $date[2] == '.' && $date[5] == '.'){
				return true;
			}
		}
		return false;
	}
	
	//skontroluje, ci je cas spravne formatovany (format d.m.Y)
	function time_has_correct_format($date = ''){
		if(strlen($date) == 19){
			if(is_numeric($date[0].$date[1]) && is_numeric($date[3].$date[4]) && is_numeric($date[6].$date[7].$date[8].$date[9]) && $date[2] == '.' && $date[5] == '.' && 
				$date[10] == ' ' && is_numeric($date[11].$date[12]) && $date[13] == ':' && is_numeric($date[14].$date[15]) && $date[16] == ':' && is_numeric($date[17].$date[18])){
				return true;
			}
		}
		return false;
	}
	
	function hide_full_email($email = '', $max_letters_before = 3, $add_str = '...'){
		if(str_contains_substr($email, '@') && str_contains_substr($email, '.') && strlen($email) > 4 && is_numeric($max_letters_before)){
			$name = substr($email, 0, strpos($email, '@'));
			$em = substr($email, strpos($email, '@'));
			if(strlen($name) > $max_letters_before){
				$name = substr($name, 0, $max_letters_before);
			}
			return $name.$add_str.$em;
		}
		return $email;
	}
	
	//zistenie realnej IP
	function get_real_ip(){
		if (isset($_SERVER['HTTP_CLIENT_IP'])){
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}elseif(isset($_SERVER['REMOTE_ADDR'])){
			$ip = $_SERVER['REMOTE_ADDR'];
		}else{
			$ip = '';
		}
		
		return $ip;
	}
	
	function get_useragent(){
		if(isset($_SERVER['HTTP_USER_AGENT'])){
			return $_SERVER['HTTP_USER_AGENT'];
		}
		return '';
	}
	
	function is_numeric_string($num, $double = true){
		if($double){
			$num = str_replace(',', '.', $num);
			if(strval(floatval($num)) == strval($num)){
				return true;
			}
		}else{
			if(strval(intval($num)) == strval($num)){
				return true;
			}
		}
		return false;
	}
	
	function str_to_float($num){
		return str_replace(',', '.', floatval($num));
	}
	
	//vygeneruje nahodny retazec znakov a cisel s dlzkou $length
	function generate_random_string($length = 10){
		$chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$result = '';
		for ($i = 0; $i < $length; $i++) {
			$result .= $chars[mt_rand(0, strlen($chars) - 1)];
		}
		return $result;
	}
	
	function strip_diacritics($string = ''){
		setlocale(LC_CTYPE, "sk_SK.utf-8");
		$string = iconv('UTF-8', 'ASCII//TRANSLIT', html_entity_decode($string));
		
		return $string;
	}
	
	function replace_tags($str = '', $replacement = ' '){
		return str_replace('  ', ' ', strip_tags(str_replace('<', $replacement.'<', $str)));
	}
	
	function to_url($string = ''){
		$string = strtolower(str_replace(array(' ', '/', ',', ';', '.', ':', '!'), '-', strip_diacritics($string)));
		return preg_replace('/[^a-zA-Z0-9]/', '-', $string);
	}
	
	function isset_post($posts = '', $equals = ''){
		$second = FALSE;
		$ok = TRUE;
		
		if(!is_array($posts)){
			$tmp = $posts;
			$posts = array($tmp);
			
			if($equals != ''){
				$tmp = $equals;
				$equals = array($tmp);
			}
		}
		
		if($equals != ''){
			if(count($equals) != count($posts)){
				return FALSE;
			}
		}
		
		foreach($posts as $key => $post){
			if(isset($_POST[$post]) && trim($_POST[$post]) != ''){
				$second = TRUE;
				if($equals != '' && $_POST[$post] != $equals[$key]){
					$ok = FALSE;
				}
			}else{
				return FALSE;
			}
		}
		
		if($second && $ok){
			return TRUE;
		}
		
		return FALSE;
	}
	
	function isset_get($gets = '', $equals = ''){
		$second = FALSE;
		$ok = TRUE;
		
		if(!is_array($gets)){
			$tmp = $gets;
			$gets = array($tmp);
			
			if($equals != ''){
				$tmp = $equals;
				$equals = array($tmp);
			}
		}
		
		if($equals != ''){
			if(count($equals) != count($gets)){
				return FALSE;
			}
		}
		
		foreach($gets as $key => $get){
			if(isset($_GET[$get]) && trim($_GET[$get]) != ''){
				$second = TRUE;
				if($equals != '' && $_GET[$get] != $equals[$key]){
					$ok = FALSE;
				}
			}else{
				return FALSE;
			}
		}
		
		if($second && $ok){
			return TRUE;
		}
		
		return FALSE;
	}
	
	//pole stringov, alebo jedna premenna strigova, ci je velkost aspon 1, alebo aspon ako zadana v druhom parametri
	function isset_string($str, $length = 1){
		$totest = array();
		if(!is_array($str)){
			$totest[] = $str;
		}else{
			$totest = $str;
		}
		
		foreach($totest as $s){
			if(strlen($s) < $length){
				return false;
			}
		}
		
		return true;
	}
	
	//PHP 7.0
	function multi_real_escape_string($str = ''){
		$CI =& get_instance();
		return $CI->db->escape_str($str);
	}
	
	//funguje pre metodu post aj get
	function remove_bad_string($index = '', $method_post = TRUE){
		if($index != ''){
			if(($method_post && isset($_POST[$index])) || (!$method_post && isset($_GET[$index]))){
				if($method_post){
					return str_replace(array('\\\n', '\\\t', '\\\b'), array("\n", "\t", "\b"), addslashes(strip_tags(multi_real_escape_string($_POST[$index]))));
				}else{
					return str_replace(array('\\\n', '\\\t', '\\\b'), array("\n", "\t", "\b"), addslashes(strip_tags(multi_real_escape_string($_GET[$index]))));
				}
			}
		}
		
		return '';
	}
	
	//funguje bey metody - vkladas string - vrati string
	function remove_bad_string_nomethod($string = ''){
		return str_replace(array('\\\n', '\\\t', '\\\b'), array("\n", "\t", "\b"), addslashes(strip_tags(multi_real_escape_string($string))));
	}
	
	//funkcia na zmazanie celeho priecinka s podpriecinkami aj subormi
	function delete_directory($dir){
		if($handle = opendir($dir)){
			$array = array();  
			while(false !== ($file = readdir($handle))){
				if($file != "." && $file != ".."){
					if(is_dir($dir.$file)){
						if(!@rmdir($dir.$file)){
							delete_directory($dir.$file.'/');
						}
					}else{
						unlink($dir.$file);
					}
				}
			}
			closedir($handle);  
			rmdir($dir);  
		}  
	}
	
