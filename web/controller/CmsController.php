<?php
#######################################################################################################
############ Admin Controller (CMS) ##################################################################
#######################################################################################################

	class CmsController extends Controller
	{
		
  	##################################################################################################
	####---// DASHBORD function

  		function dashbord(){ 
			$this->layout = 'cms';
			$d['thisongl'] = array("cat"=>"dash","pg"=>"");
			$d['dashjs'] = "active";  
			$this->loadModel('');  /// model here


			$this->set($d);
  		}
  	}
?>