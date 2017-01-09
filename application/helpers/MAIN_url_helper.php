<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter URL Helpers - Extended
 *
 * @package        CodeIgniter
 * @subpackage    Helpers
 * @category    Helpers
 * @author        Philip Sturgeon
 */

// ------------------------------------------------------------------------

/**
 * Site URL
 *
 * Create a local URL based on your basepath. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access    public
 * @param    string
 * @return    string
 */
if ( ! function_exists('site_url'))
{
    function site_url($uri = '')
	{
		$CI = get_instance();
		if     (func_num_args() > 1) $uri = implode('/', func_get_args());
		elseif (is_array($uri))      $uri = implode('/', $uri);
		
		if (in_array($uri, $CI->router->routes))
		{
		   $uri = array_search($uri, $CI->router->routes);
		}    
		else foreach ($CI->router->routes as $route => $replace)
		{
			$route   = preg_split('/(\(.+?\))/', $route,-1,PREG_SPLIT_DELIM_CAPTURE);
			$replace = preg_split('/(\$\d+)/', $replace,-1,PREG_SPLIT_DELIM_CAPTURE);
			if (count($route) != count($replace)) continue;

			$newroute = $newreplace = '';
			for ($i=0; $i < count($route); $i++)
				if ($i % 2)
				{
					$newroute .= $replace[$i];
					$newreplace .= $route[$i];
				}
				else
				{
					$newroute .= $route[$i];
					$newreplace .= $replace[$i];
				}
			$newreplace = str_replace(':any', '.+', str_replace(':num', '[0-9]+', $newreplace));
			
			if (preg_match("#^$newreplace\$#", $uri))
			{
				$uri = preg_replace("#^$newreplace\$#", $newroute, $uri);
				break;
			}
		}
		$result = $CI->config->site_url($uri);
		if($result == base_url().'default_controller'){
			return base_url();
		}
		
		return $result;
	} 
}

/* End of file url_helper.php */
/* Location: ./system/helpers/url_helper.php */

