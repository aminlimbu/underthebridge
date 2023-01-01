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
            if(file_exists('../app/controller/' . ucwords($url[0]) . '.php')){
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }

            // load the controller; e.g. home -> ../app/controller/home.php
            require_once '../app/controller/' . $this->currentController . '.php';

            // Instantiate controller for the request, new controller object
            $this->currentController = new $this->currentController;
            
            // check if there are additional parameters in the url
            if(isset($url[1])){
                // first item should be method
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }

            // assign remaining values to param 
            $this->params = $url ? array_values($url) : [];

            // callback with params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url']);
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    } 

?>