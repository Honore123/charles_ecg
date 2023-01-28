<?php

namespace App\Http\Controllers;

use App\Models\EcgData;
use App\Models\Notification;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function index()
    {
        return view('patient.index', [
            'patients' => Patient::all(),
        ]);
    }

    public function patientData(Patient $patient)
    {
        return view('patient.patient_data', [
            'patient' => $patient,
            'ecgDatas' => EcgData::query()->where('patient_id', $patient->id)->orderBy('id','DESC')->get(),
        ]);
    }

    public function add()
    {
        return view('patient.add');
    }

    public function store()
    {
        $data = request()->validate([
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'email' => ['required', 'email','unique:patients'],
            'phone_number' => ['required','unique:patients'],
            'district' => ['required', 'string'],
            'province' => ['required', 'string'],
        ]);

        $data ['password'] = Hash::make($data['phone_number']);

        Patient::create($data);

        return redirect()->route('patient.index')->with('success', 'Patient added successfully');
    }

    public function edit(Patient $patient)
    {
        return view('patient.edit', [
            'patient' => $patient,
        ]);
    }

    public function update(Patient $patient)
    {
        $data = request()->validate([
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('patients')->ignore($patient->id)],
            'phone_number' => ['required', Rule::unique('patients')->ignore($patient->id)],
            'district' => ['required', 'string'],
            'province' => ['required', 'string'],
        ]);

        $patient->update($data);

        return redirect()->route('patient.index')->with('success', 'Patient updated successfully');
    }
    public function notifyPatient(Patient $patient) {
        event(new Notification('Hello, You need to see your doctor ASAP!'));
    }
}
