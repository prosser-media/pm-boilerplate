<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Manage\ManageController;
use Illuminate\Http\Request;

class DashboardController extends ManageController
{
    public function redirect()
    {
        return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
        return view('manage.dashboard');
    }
}
