<?php
    /*
     * Base Controller
     * Loads respective models and views
     * These function are called from respective controller
     */
    class Controller{
        // Load Model
        public function model($model){
            // require the model file associated with model
            require_once '../app/models/' . $model . '.php';
            // instantiate respective model
            return new $model();
        }
        
        // Load view
        public function view($view, $data = []){
            // check if the view file exist
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            } else{
                die('view does not exixt');
            }
        }
    }

?>
