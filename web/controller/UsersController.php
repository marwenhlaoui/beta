<?php

	class UsersController extends Controller
	{
		
		
		/** login **/
  		function login(){ 
			if (isset($_SESSION['User'])) { $this->redirect('');}
			$this->layout = 'web'; 
			#.....

  		}  

		/** logout ***/
		function logout(){ 
			#.....
			
		}
?>