<?php 


namespace App\Controllers;


class ContactController {

    public function index()
    {
        return Controllers::view('contact');
    }

    public function store($params)
    {   
        echo "<pre>";
        var_dump($params);
        var_dump('store');
    }

}