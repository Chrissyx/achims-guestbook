<?php
	$i = 0;
	while (file_exists("data/data.lck") || file_exists("data/index.lck")) {
		usleep(500000);
		$i++;
		if ($i > 19) die ("User activities in progress! Please wait a little bit and try it again!");
	}
	
	if (!ignore_user_abort()) ignore_user_abort(true);
	
	register_shutdown_function("Unlock");
		
	if (!file_exists("data/lock.lck")) {
		$lock = fopen("data/lock.lck", "w") or die ("Can't create lock.lck!");
		fclose($lock);
	}
	
	function Unlock($errno = 0, $errstr = "") {
		if (file_exists("data/lock.lck")) unlink("data/lock.lck");
		exit();
	}

	set_time_limit(300);
	
	if (!file_exists("config.php")) die ("Can't open config.php!");
	include("config.php");
			
	$input = fopen("data/index.dat", "r+") or die ("Can't open index.dat for reading!");
								
	$input1 = fopen("data/data.dat", "r+") or die ("Can't open data.dat for reading!");
								
	for ($i = 0; $i < 3; $i++) {
		$dummy = fgets($input1, 1024);
	}
	for ($i = 0; $i < 2; $i++) {
		$dummy1 = fgets($input1, 1024);
	}
	if (substr($dummy1, 0, 3) != yim) {
		if (substr($dummy, 0, 3) != icq) $old = 1;
		else $old = 0;
		
		mt_srand((double)microtime()*1000000);
		$random = mt_rand(0, 1000);
		while (file_exists("temp/temp".$random.".dat")) {
			$random = mt_rand(0, 1000);		
		}
		while (file_exists("temp/temp".$random1.".dat")) {
			$random1 = mt_rand(0, 1000);		
		}
					
		$output = fopen("temp/temp".$random.".dat", "w") or die ("Can't create temp".$random.".dat!");
							
		$output1 = fopen("temp/temp".$random1.".dat", "w") or die ("Can't create temp".$random1.".dat!");
									
		$datacount = filesize("data/index.dat") / $indexsize;
					
		for ($i = 0; $i < $datacount; $i++) {
			$position = (string)ftell($output1);
			$dummy = "";
			for ($n = strlen($position); $n < $indexsize; $n++)
				$dummy .= "0";
			$position = $dummy.$position;
			fputs($output, $position);
					
			$datapos = (int)fgets($input, $indexsize + 1);
			fseek($input1, $datapos, SEEK_SET);
			if ($old == 1) {
				$name = fgets($input1, 1024);
				$mail = fgets($input1, 1024);
				$url = fgets($input1, 1024);
				$text = fgets($input1, 16384);
				$date = fgets($input1, 1024);
				fputs($output1, $name);
				fputs($output1, $mail);
				fputs($output1, "icq=\n");
				fputs($output1, "aim=\n");
				fputs($output1, "yim=\n");
				fputs($output1, "msn=\n");
				fputs($output1, "loc=\n");
				fputs($output1, $url);
				fputs($output1, $text);
				fputs($output1, $date);
				fputs($output1, "ip=\n");				
			} else {
				$name = fgets($input1, 1024);
				$mail = fgets($input1, 1024);
				$icq = fgets($input1, 1024);
				$aim = fgets($input1, 1024);
				$url = fgets($input1, 1024);
				$text = fgets($input1, 16384);
				$date = fgets($input1, 1024);
				$ip = fgets($input1, 1024);
				fputs($output1, $name);
				fputs($output1, $mail);
				fputs($output1, $icq);
				fputs($output1, $aim);
				fputs($output1, "yim=\n");
				fputs($output1, "msn=\n");
				fputs($output1, "loc=\n");
				fputs($output1, $url);
				fputs($output1, $text);
				fputs($output1, $date);
				fputs($output1, $ip);
			}
		}
					
		fclose($input);
		fclose($input1);
					
		unlink("data/index.dat");
		unlink("data/data.dat");
					
		fclose($output);
		fclose($output1);
								
		rename("temp/temp".$random.".dat", "data/index.dat");
		rename("temp/temp".$random1.".dat", "data/data.dat");
		
		echo "Successful converted!";
	} else {
		fclose($input);
		fclose($input1);
		
		echo "Database converting failed or is already done!";
	}
	
	Unlock();
?>