<?php

class FooterLinks {
    private $link;

    public function __construct($link) {
        $this->link = $link;
    }

    public function output(){
        $outputLinks = "";

        if($this->link !== ""){
            $outputLinks .= "<script src='assets/js/".$this->link."'></script>";
        }
        echo "
            <!-- Semantic ui -->
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        
            <!-- Semantic ui -->
            <script src='assets/js/semantic.min.js'></script>

            <script>
            $('.ui.dropdown').dropdown();
            </script>
        
            <script src='assets/js/search.js'></script>'" .$outputLinks;
    }
}