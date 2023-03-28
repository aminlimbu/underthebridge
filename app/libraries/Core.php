<?php
    class Core{
        protected $currentController = 'Home';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            // create array from requested path 
            $url = $this->getURL();
            
            // check if the requested controller and method exist
            if(file_exists('../app/controller/' . ucwords($url[0]) . '.php')){
                $this->currentController = ucwords($url[0]);
                // remove the controller value from array
                unset($url[0]);
            }
            
            // load the related controller
            require_once '../app/controller/' . $this->currentController . '.php';
            
            // instantiate related controller (e.g. new Blog controller)
            $this->currentController = new $this->currentController;
            
            // Check if the request include methods name
            if(isset($url[1])){
                // check models fot the related method
                if(method_exists($this->currentController, $url[1])){
                    // set currentMethod according to the request
                    $this->currentMethod = $url[1];
                    // remove the method value from the array
                    unset($url[1]);
                }
            }
            
            // store remaining values from the array to params variable
            $this->params = $url ? array_values($url) : [];
            
            // call function with associated controller, method and parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
        
        // getUrl Function
        public function getUrl(){
            if(isset($_GET['url'])){
                // sanitise request
                $url = rtrim($_GET['url']);
                $url = filter_var($url, FILTER_SANITIZE_URL);
                // create array and return
                $url = explode('/', $url);
                return $url;
            }
        }
    } 

?>
