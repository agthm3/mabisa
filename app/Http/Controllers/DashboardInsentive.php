<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardInsentive extends Controller
{
    public function index()
    {
        return view('dashboard.insentive.index');
    }

    public function show()
    {
        return view('dashboard.insentive.show');
    }
}
