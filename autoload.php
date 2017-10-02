<?php
	
	
	function loadModels($classname) {
		if(is_readable('model/'.$classname.'.php')) {
			require 'model/'.$classname.'.php';
		}
	}
    
	function loadDAO($classname) {
		if(is_readable('model/dao/'.$classname.'.php')) {
			require 'model/dao/'.$classname.'.php';
		}
	}
    	
	spl_autoload_register('loadModels');
    spl_autoload_register('loadDAO');