<?php

require "robotActions.php";
$actions = new RobotActions;

$fileInput = fopen("inputData.txt", "r") or die("Unable to open file...");

$placed = FALSE;

while (!feof($fileInput)){

	$line = fgets($fileInput);
	print $line . "";

	if (strpos($line, "PLACE") !== FALSE){
		$actions->placeRobot($line);
		$placed = TRUE;
	}

	else if ($placed == TRUE){

		$line = str_replace(array("\n","\r"), '', $line);

		switch($line){
			case "MOVE":
				$actions->moveRobot();
				break;
			case "LEFT":
				$actions->turnLeft();
				break;
			case "RIGHT":
				$actions->turnRight();
				break;
			case "REPORT":
				$actions->reportPosition();
				break;
		}
		
	}

}

fclose($fileInput);

?>