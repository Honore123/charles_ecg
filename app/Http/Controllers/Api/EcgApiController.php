<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\EcgData;
use App\Models\Patient;

class EcgApiController extends Controller
{
    public function index($patient) {
        return EcgData::where('patient_id',$patient)->orderBy('id', 'DESC')->take(80)->get();
    }
    public function dataVisibility(Patient $patient, $state) {

        $patient->update(['status' => $state]);

        return response(['message'  => 'Visibility changed', 'user' => $patient],200);

    }
}
