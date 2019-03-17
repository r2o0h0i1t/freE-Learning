<?php

class Course{
    private $con; // db connection
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function validateTitle($t) {
        // Check length
        if(strlen($t) > 25 || strlen($t) < 5) {
            array_push($this->errorArray, Constants::$titleCharacters);
            return;
        }
        // Check if title exists
        $checkTitleQuery = mysqli_query($this->con, "SELECT title FROM course WHERE title = '$t';");

        if(mysqli_num_rows($checkTitleQuery) != 0) {
            array_push($this->errorArray, Constants::$courseTaken);
            return;
        }
    
    }
    public function validateVideos($videos) {

        // Valid file extensions
        $videoFileType = array("mp4");

        for ($i=0; $i < count($videos["name"]); $i++) { 
            // Select file type
            $file_extension = strtolower(pathinfo($videos["name"][$i], PATHINFO_EXTENSION));
            
            // Check extension
            if(!in_array($file_extension,$videoFileType) ){
                array_push($this->errorArray, "Video named: " . $videos["name"][$i]." is invalid. ". Constants::$invalidVideoFormat);
                return;
            }
        }
    
    }

    public function moveVideos($videos,$courseTitle){
        // path to videos: folder name = course title
        $path = "..//..//assets//courses//".$courseTitle ;

        // create path
        if (!file_exists($path) && !is_dir($path)) {
            mkdir($path);         
        } 

        for ($i=0; $i < count($videos["name"]); $i++) { 

            // Select file type
            $file_extension = strtolower(pathinfo($videos["name"][$i], PATHINFO_EXTENSION));

            // Move video to path
            move_uploaded_file($videos['tmp_name'][$i], $path ."//".$videos["name"][$i]);
        }
    }

    public function validateImage($img){
        // Select file type
        $file_extension = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));

        // Valid file extensions
        $imageFileType = array("jpg","jpeg","png");
    
        // Check extension
        if(!in_array($file_extension,$imageFileType) ){
            array_push($this->errorArray, Constants::$invalidImageFormat);
            return;
        }
        if (($img["size"] > 2000000)) {
            array_push($this->errorArray, Constants::$imageTooLarge);
            return;
        }
    }

    public function moveImage($img,$courseTitle){
        // Select file type
        $file_extension = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));

        // path to folder
        $path = "..//..//assets//courses//".$courseTitle ;
        
        // Move video to path
        move_uploaded_file($img['tmp_name'], $path ."//".$courseTitle.'.' .$file_extension);
    }

    public function insertDb($title,$category,$teaser,$benefit,$requirements,$description,$target,$numOfVideos){
        $date = date("Y/m/d");
    
        // Insert values to db
        $result = mysqli_query($this->con, "INSERT INTO course VALUES ('', '$title', '$category', '$teaser','$benefit','$requirements', '$description','$target','$numOfVideos','$date')");
        return $result;
    }

    public function insertVideos($title,$videos){
        $query = "";

        $idQuery = "SELECT id FROM course WHERE title = '$title'";
        $result =  mysqli_query($this->con, $idQuery);
        $courseId = mysqli_fetch_assoc($result)['id'];

        for ($i=0; $i < count($videos["name"]); $i++) { 

            // Remove extension from name
            $vidName = str_replace(".mp4",'', $videos["name"][$i]);

            // Select file type
            $query .= "INSERT INTO videos VALUES ('$courseId','$vidName');";

        }

        $result = mysqli_multi_query($this->con, $query);
        return $result;
    }

    public function validateAll($title,$videos,$image){
        $this->validateTitle($title);
        $this->validateVideos($videos);
        $this->validateImage($image);

        return empty($this->errorArray);
    }

    public function getErrors(){
        return $this->errorArray;
    }
}