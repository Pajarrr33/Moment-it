<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Postingan extends BaseController
{
    public function index()
    {
        return view('postingan/index') ;
    }
}
