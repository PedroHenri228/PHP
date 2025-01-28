<?php 

namespace App\Controllers;


class HomeController {
    
    public function index($params)
    {   
        echo "<pre>";
        var_dump($params);
        return Controllers::view("home");
        
    }
    
}