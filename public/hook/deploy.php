<?php #!/usr/bin/env /usr/bin/php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	$log_path  = '/home/deploy/app/nzblog/logs';

	if(!is_dir($log_path)){
		mkdir($log_path);
	}

	try {
		$git_json = json_decode(file_get_contents('php://input'),true);
	} catch(Exception $e) {
		file_put_contents($log_path . '/deploy.err',$e . '' . $git_json, FILE_APPEND);
	}

	if($git_json['ref'] === 'refs/heads/master'){
		
		$output = exec('cd /home/deploy/app/nzblog/ && /usr/bin/git pull');

		file_put_contents($log_path . '/deploy.log', $output, FILE_APPEND);
	}
