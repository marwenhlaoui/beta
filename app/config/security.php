<?php 

	$this_url = trim($request->url,'/');
	$this_params = explode('/', $this_url);	 
	if($this_params["0"] == 'admin'){  
		if ((!isset($_SESSION['User'])) OR $_SESSION['User']->role == "0") {
			$this->redirect('login');
		}
	} 
	/*Les Roles 
		#0:User
		#1:Admin 

	*/
?>