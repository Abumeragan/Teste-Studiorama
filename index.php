<?php 
    require 'vendor/autoload.php';
    require 'autoload.php';

    $config['displayErrorDetails'] = true;
    
    $app = new \Slim\App(["settings" => $config]);        
        
	include 'routes.php';
	
    $app->run();