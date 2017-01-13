<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$config['webdesign_homepage_video'] = 'https://www.youtube.com/watch?v=VDBYMFGPm1w';
	$config['webdesign_email_from'] = 'fhi-web@poriadne.sk';
	$config['webdesign_email_name_from'] = 'FHI WEB poriande.sk';

	$config['webdesign_quiz'] = array(
		1 => array(
			'question' => 'Na čo slúži v unixe príkaz ls?',
			'answers' => array(
				'a' => 'Na zobrazenie aktuálnych procesov systému.',
				'b' => 'Na vylistovanie obsahu aktuálneho adresára.',
				'c' => 'Na otvorenie textového editora.',
				'd' => 'Príkaz ls neexistuje.'
			),
			'correct' => 'b'
		),
		2 => array(
			'question' => 'Na akej doméne bývajú webové stránky armády?',
			'answers' => array(
				'a' => '.mil',
				'b' => '.army',
				'c' => '.arm',
				'd' => '.war'
			),
			'correct' => 'a'
		),
		3 => array(
			'question' => 'Klávesová skratka CTRL + SHIFT + T v chrome:',
			'answers' => array(
				'a' => 'Otvorí novú kartu.',
				'b' => 'Zatvorí aktuálnu kartu.',
				'c' => 'Zatvorí prehliadač.',
				'd' => 'Otvorí naposledy zatvorenú kartu.'
			),
			'correct' => 'd'
		),
		4 => array(
			'question' => 'Ktorý OS nepatrí do rodiny linuxov?',
			'answers' => array(
				'a' => 'OpenBSD',
				'b' => 'UBUNTU',
				'c' => 'KNOPPIX',
				'd' => 'SLAX'
			),
			'correct' => 'a'
		),
		5 => array(
			'question' => 'Aká je národná doména USA?',
			'answers' => array(
				'a' => '.net',
				'b' => '.com',
				'c' => '.us',
				'd' => '.org'
			),
			'correct' => 'c'
		),
	);
