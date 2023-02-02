<?php

namespace App\Http\Controllers;

use App\Models\HeartData;
use Illuminate\Http\Request;

class HeartDataController extends Controller
{
    public function store($patient, $heart_rate, $heart_variability)
    {
        HeartData::create([
            'patient_id' => $patient,
            'heart_rate' => $heart_rate,
            'heart_rate_variability' => $heart_variability
        ]);

        echo "data recorded";
    }
}
