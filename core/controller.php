<?php

/**
 * Controller class
 *
 * This class represents the abstract controller.
 *
 * @category   Controllers
 * @package    Core
 */

class Controller{
    public $model;

    /**
      * The model construct
      *
      */   
    public function __construct($model) {
        $this->model = $model;
        $this->view = new View;
    }
	
    /**
     * The method load data array.
     *
     * @access  public
     */	
    public function load() {
    
        //Get data       
        $data = $this->model->get_data();
        
        if(!is_array($data) || empty($data) ){
            throw new Exception("Input data must be an array and not empty!");
        }   

	$myObj = new stdClass();
	$myObj->key = "";
	$myObj->value = "";
	$myObj->col = "";
	$i = 0;

	// Create new array with additional parametrs of colomn
	foreach ($data as $item){
		$i++;
		foreach($item as $key => $value) {
			$myObj->key = $key;
			$myObj->value = $value;
			$myObj->col = $i;
			$myJSON = json_encode($myObj);
			$newarrjson[$key][] = $myJSON; 
		}
	}

	//Sort in alphabetical order
	ksort($newarrjson, SORT_NATURAL | SORT_FLAG_CASE);

        // Execute with values  
        $this->view->render($newarrjson);

    }

}


