<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Display a listing of patients
    public function index()
    {
        $patients = Patient::all();
        return view('patients.list', compact('patients'));
    }

    // Show the form for creating a new patient
    public function create()
    {
        return view('patients.addform');
    }

    // Store a newly created patient in storage
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|max:255|unique:patients,email',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    // Display the specified patient
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    // Show the form for editing the specified patient
    public function edit(Patient $patient)
    {
        return view('patients.form', compact('patient'));
    }

    // Update the specified patient in storage
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|email|max:255|unique:patients,email,' . $patient->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    // Remove the specified patient from storage
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
