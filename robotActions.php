<?php

class RobotActions{

    private $maxSize = 5;
    private $xValue;
    private $yValue;
    private $face;
    private $key = 0;
    private $faceArray = array(0=>"NORTH", 1=>"EAST", 2=>"SOUTH", 3=>"WEST");

    /*Function to place the robot */
    public function placeRobot($line){
        $this->xValue = $line[6];
        $this->yValue = $line[8];
        $this->face = substr($line, 10);
        $this->face = str_replace(array("\n","\r"), '', $this->face);
    }

    /*Function to move the robot */
    public function moveRobot(){
        if($this->face == "NORTH"){
            if($this->yValue == ($this->maxSize-1)){
                echo "\nInvalid Move\n";
            }
            else{
                $this->yValue++;
            }
        }
        if($this->face == "EAST"){
            if($this->xValue == ($this->maxSize-1)){
                echo "\nInvalid Move\n";
            }
            else{
                $this->xValue++;
            }
        }
        if($this->face == "SOUTH"){
            if($this->yValue == 0){
                echo "\nInvalid Move\n";
            }
            else{
                $this->yValue--;
            }
        }
        if($this->face == "WEST"){
            if($this->xValue == 0){
                echo "\nInvalid Move\n";
            }
            else{
                $this->xValue--;
            }
        }
    }

    /*Function to turn the robot left */
    public function turnLeft(){
        $this->key = array_search("$this->face",$this->faceArray);
        if ($this->key == 0){
            $this->face = $this->faceArray[3];
        }
        else{
            $this->key--;
            $this->face = $this->faceArray[$this->key];
        }
    }

    /*Function to turn the robot right */
    public function turnRight(){
        $this->key = array_search("$this->face",$this->faceArray);
        if ($this->key == 3){
            $this->face = $this->faceArray[0];    
        }
        else{
            $this->key++;
            $this->face = $this->faceArray[$this->key];
        }
    }

    /*Function to print the current position of the robot */
    public function reportPosition(){
        echo "\n\n$this->xValue,$this->yValue,$this->face\n";
    }

}

?>