<?php
    // redirect url
    function redirect($page){
        header('location: ' . URLROOT . '/'. $page);
    }
?>