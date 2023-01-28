<?php

namespace App\Http\Controllers;

use App\Models\EcgData;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {   
        return view('dashboard.dashboard', [
            'patient' => Patient::all()->count(),
            'reports' => EcgData::distinct()->count('patient_id')
        ]);
    }
}
