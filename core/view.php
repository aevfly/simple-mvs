<?php

/**
 * This view class.
 *
 * This class allows to display HTML.
 *
 * @category   View
 * @package    Core
 */

class View{
    public $model;

    public function __construct($controller = null,$model = null) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output(){
        return '<p><a href="index.php?action=load">Load data</a></p>';
    }
    
   /**
     * The render method.
     * 
     * This method displays the site's content.
     *
     * @param array $data An array of the controller variables.
     *
     * @access  public
     */
    public function render($data = null){
    
	// Creating simple html page using a proper Doctype declaration HTML5
	$html = '<!DOCTYPE html>
	<html lang="en">
	<head>
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<meta charset="utf-8">
	<title>Main</title>
	</head>
	<body>';

	$html .= '<div class="table">';
	//For each element in an array in ascending index order
	foreach ($data as $key => $item){
	
	    // Get header of colomn
	    $col = 0;
	    $tabletbody = '<div class="col">';
	    $tabletbody .= '<div class="head-line">'.$key .'</div>';
	    $tabletbody .= '<div>';
	    
	    foreach($item as $key => $value) {
	    	$col++;
		$json = json_decode($value);
		// Check if in colomn keys are missing then add empty cell
		if($json->col > $col){
			for ($k = 1; $k <= ($json->col-$col); $k++) {
				$tabletbody .= '<div class="empty">&nbsp</div>';
			}	
			$col = $json->col;
		}
		$tabletbody .= '<div class="line">'.$json->value .'</div>';	
	    }
	    $tabletbody .= '</div>';
	    $tabletbody .= '</div>';
	    $html .=  $tabletbody;
	    $tabletbody = '';  
	};

	$html .= '</div>';
	$html .= '</body></html>';

    echo $html;

    }    
}


