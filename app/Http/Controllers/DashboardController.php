<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {   
        return view('dashboard.dashboard', [
            'patient' => Patient::all()->count(),
        ]);
    }
}
