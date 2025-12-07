<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardVerificationEvidence extends Controller
{
    public function index()
    {
        return view('dashboard.verification.index');
    }

    public function show()
    {
        return view('dashboard.verification.show');
    }
}
