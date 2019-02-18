<?php

class Course{
    private $con; // db connection
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function validateTitle($t) {

        // Check if title exists
        $checkTitleQuery = mysqli_query($this->con, "SELECT title FROM course;");

        if(mysqli_num_rows($checkTitleQuery) != 0) {
            array_push($this->errorArray, Constants::$courseTaken);
            return;
        }
    
    }
    public function validateVideos($videos) {

        // Valid file extensions
        $videoFileType = array("mp4","avi","mov","wmv");

        for ($i=0; $i < count($videos["name"]); $i++) { 
            // Select file type
            $file_extension = pathinfo($videos["name"][$i], PATHINFO_EXTENSION);
            
            // Check extension
            if(!in_array($file_extension,$videoFileType) ){
                array_push($this->errorArray, "Video named: " . $videos["name"][$i]."is invalid. ". Constants::$invalidVideoFormat);
                return;
            }
        }
            
    
    }

    public function insertDb($title,$category,$teaser,$benefit,$requirements,$description,$target){
        $date = date("Y/m/d");
    
        // Insert values to db
        $result = mysqli_query($this->con, "INSERT INTO course VALUES ('', '$title', '$category', '$teaser','$benefit','$requirements', '$description','$target','$date')");
        return $result;
    }

    public function validateAll($title,$videos){
        $this->validateTitle($title);
        $this->validateVideos($videos);

        return empty($this->errorArray);
    }

    public function getErrors(){
        return $this->errorArray;
    }
}