<?php

	class PagesController extends Controller
	{
		
		function home(){
			$this->layout = 'web';
			$d['thisongl'] = 'home'; 
			$this->loadModel(''); /// model here

			$this->set($d);
		}

 

	}
?>