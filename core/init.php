<?php

/**
 * The init class.
 *
 * Implementation that includes the optional
 * functionality of allowing to get start page to load data.
 *
 * @package    Core
 *
 */

    class init{
	static function start(){
		
	$model = new Model();
	$controller = new Controller($model);
	$view = new View($controller, $model);
	
	$params = $_SERVER['argv'][0];

	//Load the controller and execute the action
	if (isset($params ) && !empty($params )) {
	    	$controller->load(); 	    	
	}else{	 
		// Generate link to load data
		echo $view->output();
	}
	    
	
	// exception or error 404
	//	Init::ErrorPage404();
	
	}
	
	function ErrorPage404(){
        	$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        	header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    	}
    }

