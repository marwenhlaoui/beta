﻿<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////  Version 1 - 2015 //////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 	require_once ROOT.'/vendor/lib/function/use.php'; 
	function debug($var){

		if (Conf::$debug>0) {
			$debug = debug_backtrace();
		echo '<p>&nbsp</p><p><a href="#" onclick="$(this).parent().next(\'ol\').slideToggle();return false;"><strong>'.$debug[0]['file'].'</strong> 1.'
		.$debug[0]['line'].'</a></p>';
		echo '<ol style="display:none;">';
		foreach ($debug as $k => $v) { if ($k>0) {
			echo '<li><strong>'.$v['file'].'</strong> 1.'
		.$v['line'].'</li>';
			}
		}
		echo "</ol>";

		echo '<pre>';
		print_r($var);
		echo'</pre>';
		}
	}
  
 	used("basic");
 	used("security");
 	used("data");
 	used("style");
 	used("time");
 	used("analyse");
 	used("visiteur");
 	used("mysql");





?>