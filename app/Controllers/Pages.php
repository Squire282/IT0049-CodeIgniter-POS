<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function home()
    {
        $data['title'] = 'Home';

        return view('home', $data);
    }

    public function about()
    {
        $data['title'] = 'About';

        return view('about', $data);
    }
}