<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;

class AppointmentController extends Controller
{
    // Display a listing of the appointments.
    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor'])->get();

        return view('appointments.index', compact('appointments'));
    }

    // Show the form for creating a new appointment.
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('appointments.create', compact('patients', 'doctors'));
    }

    // Store a newly created appointment in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'reason' => 'required|string',
            'status' => 'required|in:Scheduled,Completed,Canceled',
        ]);

        Appointment::create($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    // Display the specified appointment.
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    // Show the form for editing the specified appointment.
    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    // Update the specified appointment in storage.
    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'reason' => 'required|string',
            'status' => 'required|in:Scheduled,Completed,Canceled',
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    // Remove the specified appointment from storage.
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}

