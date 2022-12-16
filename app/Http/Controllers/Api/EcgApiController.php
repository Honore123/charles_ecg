<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\EcgData;

class EcgApiController extends Controller
{
    public function index($patient) {
        return EcgData::where('patient_id',$patient)->orderBy('id', 'DESC')->take(5)->get();
    }
}
