<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Pages\PageController;
use Illuminate\Http\Request;

class HomeController extends PageController
{
    public function __invoke()
    {
        return view('pages.home');
    }
}
