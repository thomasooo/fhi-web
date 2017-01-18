<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$config['webdesign_homepage_video'] = 'https://www.youtube.com/watch?v=VDBYMFGPm1w';
	$config['webdesign_email_from'] = 'fhi-web@poriadne.sk';
	$config['webdesign_email_name_from'] = 'FHI WEB poriande.sk';

	$config['webdesign_quiz'] = array(
		1 => array(
			'question' => 'Na ktoré elementy sa v CSS vzťahuje "div&gt;p"?',
			'answers' => array(
				'a' => 'Všetky "p" elementy, ktoré nie sú uzavreté v "div".',
				'b' => 'Všetky "p" elementy, ktorých rodičovský element je "div".',
				'c' => 'Všetky "div" elementy, ktorých rodičovský element je "p".',
				'd' => 'V CSS takýto selector neexistuje.'
			),
			'correct' => 'b'
		),
		2 => array(
			'question' => 'Ktoré elementy boli z HTML5 vylúčené?',
			'answers' => array(
				'a' => '&lt;frame&gt;, &lt;frameset&gt;, &lt;noframes&gt;',
				'b' => '&lt;div&gt;, &lt;p&gt;, &lt;br&gt;',
				'c' => '&lt;span&gt;, &lt;nav&gt;, &lt;hr&gt;',
				'd' => 'žiadne'
			),
			'correct' => 'a'
		),
		3 => array(
			'question' => 'Aký jazyk nie je obsiahnutý v Bootstrape?',
			'answers' => array(
				'a' => 'CSS',
				'b' => 'HTML',
				'c' => 'JavaScript',
				'd' => 'PYTHON'
			),
			'correct' => 'd'
		),
		4 => array(
			'question' => 'Čo nedokážeme naprogramovať v PHP?',
			'answers' => array(
				'a' => 'Natívnu aplikáciu pre počítač.',
				'b' => 'Aplikáciu pre server Apache2.',
				'c' => 'Aplikáciu pre server NGINX.',
				'd' => 'Server - side aplikáciu.'
			),
			'correct' => 'a'
		),
		5 => array(
			'question' => 'Ktorá z uvedených možností nie je PHP framework?',
			'answers' => array(
				'a' => 'CodeIgniter',
				'b' => 'Zend',
				'c' => 'Electron',
				'd' => 'Symfony'
			),
			'correct' => 'c'
		),
	);
