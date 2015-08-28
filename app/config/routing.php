<?php


/***************  Base *****************************************/

	Router::connect('','pages/home');//home page   
	Router::connect('about','pages/about');//home page   
	Router::connect('contact','pages/contact');//home page    
	//Router::connect('watch/:slug','films/watch/slug:([0-9-a-z-A-Z]+)');//film page exemple   

/***************  Admin *****************************************/

	Router::connect('login','users/login');//login page  
	Router::connect('logout','users/logout');//logout  
	Router::connect('inscription','users/inscription');//Inscription page    

	Router::connect('admin','cms/dashbord');//dashbord page  

?>