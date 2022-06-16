<?php

/**
  * The abstract model class.
  *
  * Model include methods get data:
  * methods pgsql or myssql
  * methods implements of abstract daya. For example lib PEAR MDB2
  * methods ORM
  * methods of NoSQL
  *
  * @category   Model  
  * @package    Core
  *
  */ 
    class Model{
        public $string;
     	
     	/**
     	* The name of the array from example
     	*
     	* @var array
     	*/     
	private $arr; 
        
    	/**
     	* The model construct
     	*
     	*/        
        public function __construct(){
            $this->string = "simple string";
        }
        
    	/**
     	* Abstract method for getting array of data.
     	*
     	*
     	* @return array
     	* @access  public
     	*/        
        public function get_data(){	
        
            
    	$arr = array(			
			    array(
				'House' => 'Baratheon',
				'Sigil' => 'A crowned stag',
				'Motto' => 'Ours is the Fury',
				),
			    array(
				'Leader' => 'Eddard Stark',
				'House' => 'Stark',
				'Motto' => 'Winter is Coming',
				'Sigil' => 'A grey direwolf'
				),
			    array(
				'Leader' => 'Eddard <br />Stark',
				'Q' => 'Stark',
				'B o B' => 'Winter is Coming <br />',
				'Sigil' => 'A grey direwolf'
				),
			    array(
				'B' => 'Winter is Coming',
				true => 'A grey direwolf'
				),
			    array(
				-100 => '123',
				),
			    array(
				'' => '',
				),
			    array(
				'bro',
				),	
			    array(
				'*' => 'look',
				),
			    array(
				'House' => 'Lannister',
				'Leader' => 'Tywin Lannister',
				'Sigil' => 'A golden lion'
				),
			    array(
				      'Q' => 'Zaz'
			    )
			// todo
		);

		return $arr;
	}
	
    }

