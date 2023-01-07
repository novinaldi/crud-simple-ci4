<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Person extends BaseController
{
    public function index()
    {
        return 'Hello World !';
    }

    public function data()
    {
        return view('person_data');
    }
}