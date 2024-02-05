<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        if(!$this->session->get('Islogin'))
        {
            return view('index');
        }
        
        return view('home');
    }
}
