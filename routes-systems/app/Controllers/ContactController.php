<?php 


namespace App\Controllers;


class ContactController {

    public function index()
    {
        Controllers::view('contact');
    }

    public function store()
    {
        var_dump('store');
    }

}