<?php
    /*
     * Core Class
     * Creates URL & Loads Core Controller; Route
     */
    class Core{
        // properties
        protected $currentController = 'Home';
        protected $currentMethod = 'index';
        protected $params = [];

        // methods
        public function __construct(){
            // get the requested url as array
            $url = $this->getURL();
            
        }
    } 

?>