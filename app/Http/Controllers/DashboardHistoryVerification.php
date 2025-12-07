<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardHistoryVerification extends Controller
{
    public function index()
    {
        return view('dashboard.history_verification.index');
    }
}
