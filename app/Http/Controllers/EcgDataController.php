<?php

namespace App\Http\Controllers;

use App\Models\EcgData;
use Illuminate\Http\Request;

class EcgDataController extends Controller
{
    public function store($patient, $data)
    {
        EcgData::create([
            'patient_id' => $patient,
            'data' => $data,
            'recorded_time' => now(),
        ]);

        echo "data recorded";
    }

    public function chartData($patient)
    {
        $response = EcgData::query()->where('patient_id', $patient)->orderBy('id', 'DESC')->take(80)->get();
    
        return response()->json($response->reverse()->values());
    }
}
