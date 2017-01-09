<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
Autor: Tomas Ballon
*/
Class Tpl{

	private $CI;
	protected $data;

	public function __construct(){
		$this->CI =& get_instance();
		$this->data =& $this->CI->data;

		$this->CI->load->config('tpl');

		$this->reset();
	}

	public function title($title = '', $remove_base_title = false){
		$this->data['template']['title'] = '';
		if(!$remove_base_title){
			$this->data['template']['title'] = $this->CI->config->item('page_base_title');
		}
		if($title != ''){
			$this->data['template']['title'] = $title.' | '.$this->data['template']['title'];
		}
	}

	public function add_js($js = '', $footer = false){
		$index = 'js';
		if($footer){
			$index = 'js_footer';
		}

		$this->data['template'][$index] .= '<script type="text/javascript">'.$js.'</script>'."\n";
	}

	public function add_js_src($src = '', $footer = false, $absolute_path = false){
		$index = 'js_src';
		if($footer){
			$index = 'js_src_footer';
		}

		if(!$absolute_path){
			$src = base_url($src);
		}

		$this->data['template'][$index] .= '<script type="text/javascript" src="'.$src.'"></script>'."\n";
	}

	public function add_linking($href = '', $attributes = array(), $absolute_path = false){
		if(!$absolute_path){
			$href = base_url($href);
		}
		$this->data['template']['links'] .= '<link href="'.$href.'" ';
		foreach($attributes as $name => $value){
			$this->data['template']['links'] .= $name.'="'.$value.'" ';
		}
		$this->data['template']['links'] .= '/> '."\n";
	}

	public function add_css($src = '', $absolute_path = false){
		$this->add_linking($src, array('rel' => 'stylesheet'), $absolute_path);
	}

	public function add_meta($attributes = array()){
		$this->data['template']['meta'] .= '<meta ';
		foreach($attributes as $name => $value){
			$this->data['template']['meta'] .= $name.'="'.$value.'" ';
		}
		$this->data['template']['meta'] .= '/>'."\n";
	}

	public function add_str_to_header($str = ''){
		$this->data['template']['other_header'] .= $str."\n";
	}

	public function reset(){
		$this->data['template'] = array(
									'title' => '',
									'js_src' => '',
									'js_src_footer' => '',
									'js' => '',
									'js_footer' => '',
									'links' => '',
									'meta' => '',
									'other_header' => '',
								);
	}

////////////////////////////////////////////////////////////////////////////////
//GROUPPED//////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

	public function add_bootstrap(){
		$this->add_css('bootstrap/css/bootstrap.min.css');
		$this->add_js_src('plugins/jQuery/jquery-2.2.3.min.js', true);
		$this->add_js_src('bootstrap/js/bootstrap.min.js', true);
	}

	public function add_admin_lte(){
		$this->add_css('bootstrap/css/bootstrap.min.css');
		$this->add_css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css', true);
		$this->add_css('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css', true);
		$this->add_css('plugins/jvectormap/jquery-jvectormap-1.2.2.css');
		$this->add_css('lte/css/AdminLTE.min.css');
		$this->add_css('lte/css/skins/_all-skins.min.css');

		$this->add_js_src('plugins/jQuery/jquery-2.2.3.min.js', true);
		$this->add_js_src('bootstrap/js/bootstrap.min.js', true);
		$this->add_js_src('plugins/fastclick/fastclick.js', true);
		$this->add_js_src('lte/js/app.min.js', true);
		$this->add_js_src('plugins/sparkline/jquery.sparkline.min.js', true);
		$this->add_js_src('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js', true);
		$this->add_js_src('plugins/jvectormap/jquery-jvectormap-world-mill-en.js', true);
		$this->add_js_src('plugins/slimScroll/jquery.slimscroll.min.js', true);
		$this->add_js_src('plugins/chartjs/Chart.min.js', true);
	}

}
