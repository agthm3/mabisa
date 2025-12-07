<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardIndikatorController extends Controller
{
    public function index()
    {
        return view('dashboard.indikator.index');
    }
}
