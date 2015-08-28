<?php
  
	 #
	 # include all model(get all file in model folder)  
	 # if not exist tabel in data so addet in my database */
		ChekDATA();
	 	function ChekDATA(){
			$dir = WEB.'/model';
			if ($handle = opendir($dir)) {
				while (false !== ($entry = readdir($handle))) {
					if ($entry != "." && $entry != "..") {
						$file = explode('.', $entry); 
						if ($file[1] == 'php') {
								$title = lcfirst($file[0]).'s';  
								include $dir.'/'.$entry;
								if (!empty($model)) {
									$cont = new Model; 
									$cont->CreatTab($title,$model); 
								}
						}
						        
					}
				} 
				closedir($handle); 
			}
	 	}

	 ##########################################################################################
	 ############## Get Model list and data

	 	function GetModelSite($type=null,$tb=null){
	 		$type = (!empty($type)) ? $type : "list" ;
			$dir = WEB.'/model';
			if ($handle = opendir($dir)) {
				while (false !== ($entry = readdir($handle))) {
					if ($entry != "." && $entry != "..") {
						$file = explode('.', $entry); 
						if ($file[1] == 'php') {
							$title = lcfirst($file[0]).'s';  
							if ($type == "list") {
							 	$tab[$title] = $file[0];
							 }else{
								include $dir.'/'.$entry;
								if (!empty($model)) {
								    $tab[$title]= $model;
									$cont = new Model; 
									$cont->CreatTab($title,GetModelSite("data",$tab)); 
								    if (!empty($tb)AND($file[0] == $tb)) {
								    	$onetab = $model;
								    }
								}
							}
						}
						        
					}
				} 
				closedir($handle); 
			}

	 		if (!empty($tab)) {
	 			if ((!empty($tb))AND(!empty($onetab))) {
	 				$tab = $onetab;
	 			}
	 				return $tab;
				//debug($tab); 
	 			//die("<br>this is mysql function to fixed data sql problem ...");
	 		}else{
	 			return array();
	 		}
	 	}







 ?>