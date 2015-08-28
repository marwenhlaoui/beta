<?php
	class Post extends Model
	{
		
##############################################################
###################################validation de post 

		var $validate = array(
			'slug' => array(
				'rule' => '([a-z0-9\-]+)',
				'message' => "L'url n'est pas valide"
					)
			);









######################################################################
		function validates($data,$type=null){
			$errors = array();
			//debug($this->validate);
			foreach ($this->validate as $k => $v) {
				if (!isset($data->$k)) {
					$errors[$k] = $v['message'];
				}else{
					if ($v['rule'] == 'notEmpty'){
						if (empty($data->$k)) {
							$errors[$k] = $v['message'];
						}
					}elseif (!preg_match('/^'.$v['rule'].'$/', $data->$k)) {
						$errors[$k] = $v['message'];
					}
				}
			}
			$this->errors = $errors;
			if (isset($this->Form)) {
				$this->Form->errors = $errors;
			}
			if (!empty($type)) {
				foreach ($errors as $key => $value) { 
					return $value;
				}
			}else{
				if (empty($errors)) {
					return true;
				}
				return false;
			}
			
		}


	}
#####################################################################################	
 
$model = array(  
######################################################################################
# 	type Exemple : INT,VARCHAR,TEXT,DATE,TIME,DATETIME,BOOLEAN,...
######################################################################################
# @ posts.id is default 
# @ posts.slug 
#########################
	"slug" 	=> array(
		"type" 	=> "VARCHAR",
		"size" 	=> "20" 
	),
# @ posts.title
#########################
	"title" => array(
		"type" 	=> "TEXT" 
	),
# @ posts.img
#########################
	"img" => array(
		"type" 	=> "VARCHAR" 
	),
# @ posts.description
#########################
	"description" => array(
		"type" 	=> "TEXT" 
	),
# @ posts.date
#########################
	"date" => array(
		"type" 	=> "DATETIME" 
	),
# @ posts.content
#########################
	"content" => array(
		"type" 	=> "TEXT" 
	),
# @ posts.idcateg
#########################
	"idcateg" => array(
		"type" 	=> "VARCHAR" 
	),
# @ posts.tags
#########################
	"tags" => array(
		"type" 	=> "TEXT" 
	),
# @ posts.online
#########################
	"online" => array(
		"type" 	=> "BOOLEAN" 
	),
# @ posts.iduser
#########################
	"iduser" => array(
		"type" 	=> "INT" 
	),
# @ posts.vue
#########################
	"vue" => array(
		"type" 	=> "VARCHAR" 
	), 
# @ posts.ref
#########################
	"ref" => array(
		"type" 	=> "BOOLEAN" 
	),
######################################################################################

);