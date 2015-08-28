<?php
	class Form
	{
		public $controller;
		public $errors;

		public function __construct($controller)
		{
			$this->controller = $controller;
		}

		public function input($name,$label,$options = array()){

			$error = false;
			$classError = '';
			
			if (isset($this->errors[$name])) {
				$error  = $this->errors[$name];
				$classError = '  control-group error';
			}

			if (!isset($this->controller->request->data->$name)) {
				$value = '';
			}else{
				$value = $this->controller->request->data->$name;
			}
			if ($label == 'hidden') {
				return '<input type="hidden" name="'.$name.'" value ="'.$value.'">';
			}

			
				$htmlchek  =  '<div class="them_chek clearfix '.$classError.'">
					<label for="input'.$name.'">'.$label.'</label>
					<div class="input">';
				$htmlnormal  =  '<div class="clearfix '.$classError.'">
					<label for="input'.$name.'">'.$label.'</label>
					<div class="input">';
				$html = ' ';
				$attr = ' ';
				foreach ($options as $k => $v ) {
					if ($k != 'type') {
						$attr .= " $k=\"$v\"";
					}}
				if (empty($options['class'] )) {
					$options['class'] ="";
				}
				if (!isset($options['type'])) {
					$html .= $htmlnormal;
					$html .= '<input type="text" id="input'.$name.'" class="'.$options['class'].'" style="padding: 13px;max-width: 900px;" name="'.$name.'" value="'.$value.'">';
				}elseif ($options['type'] == 'email') {
					$html .= $htmlnormal;
					$html .= '<input type="email" id="input'.$name.'"  class="'.$options['class'].' normalinput" name="'.$name.'" value="'.$value.'">';		
				}elseif ($options['type'] == 'password') {
					$html .= $htmlnormal;
					$html .= '<input type="password" id="input'.$name.'" class="'.$options['class'].' normalinput" name="'.$name.'" value="'.$value.'">';		
				}elseif ($options['type'] == 'textarea') {
					$html .= $htmlnormal;
					$html .= '<textarea id="input'.$name.'" name="'.$name.'" class="'.$options['class'].'" style="padding: 10px;margin: 0px 0px 10px; min-height:'.$options['height'].';min-width:'.$options['width'].';max-width:'.$options['width'].';">'.$value.'</textarea>';		
				}elseif ($options['type'] == 'checkbox') {
					$html .= $htmlchek;
					$html .= '<input type="hidden" name="'.$name.'" value="0"><input type="checkbox" name ="'.$name.'" value="1" '.(empty($value)?'':'checked').'>';
				}elseif ($options['type'] == 'file') {
					$html .= $htmlnormal;
					$html .= '<input type="file" class="input-file" id="input'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
				}

				if ($error) {
					$html .= '<span class="help-inline">'.$error.'</span>';
				}

				$html .= '</div> </div>';
				return $html ;
						
		}
	}
?>