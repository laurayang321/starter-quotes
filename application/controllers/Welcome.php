<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}
        
	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array (
                            'who' => $record['who'],
                            'mug' => $record['mug'],
                            'href' => $record['where'],
                            'what'=>$record['what']);
		}
		$this->data['authors'] = $authors;

		$this->render();
               
	}
        
         /**
	 * Random for our app
         * call this function to display random quote on random page
	 */
	public function random()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
                
                //get random record
                $count = count($source);  
                $index = rand(0, $count-1);
                $record = $source[$index]; 
                
                //set the randomed record into authors
                $authors[] = array (
                    'who' => $record['who'],
                    'mug' => $record['mug'],
                    'href' => $record['where'],
                    'what'=>$record['what']);
		
		$this->data['authors'] = $authors;

		$this->render();
	}
}


