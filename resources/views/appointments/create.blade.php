{{-- call the main layout  --}}
@extends('default')
{{-- for the titile of the page  --}}
@section('title') Product Listing @parent @endsection
{{-- additional style here intended for this blade  --}}
@section('styles')
@endsection
{{-- for the content of the page  --}}
@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-5">Create Appointment</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Appointment Form -->
        <form action="{{ route('appointments.store') }}" method="POST" class="form">
            @csrf

            <!-- Patient Selection -->
            <div class="mb-4">
                <label for="patient_id" class="block text-gray-700 font-bold mb-2">Patient:</label>
                <select name="patient_id" id="patient_id" class="form-select block w-full mt-1">
                    <option value="">-- Select a Patient --</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Doctor Selection -->
            <div class="mb-4">
                <label for="doctor_id" class="block text-gray-700 font-bold mb-2">Doctor:</label>
                <select name="doctor_id" id="doctor_id" class="form-select block w-full mt-1">
                    <option value="">-- Select a Doctor --</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Appointment Date and Time -->
            <div class="mb-4">
                <label for="appointment_date" class="block text-gray-700 font-bold mb-2">Appointment Date and Time:</label>
                <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control block w-full mt-1" value="{{ old('appointment_date') }}">
            </div>

            <!-- Reason for Appointment -->
            <div class="mb-4">
                <label for="reason" class="block text-gray-700 font-bold mb-2">Reason for Appointment:</label>
                <textarea name="reason" id="reason" rows="4" class="form-control block w-full mt-1">{{ old('reason') }}</textarea>
            </div>

            <!-- Appointment Status -->
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
                <select name="status" id="status" class="form-select block w-full mt-1">
                    <option value="Scheduled" {{ old('status') == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Canceled" {{ old('status') == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Create Appointment</button>
            </div>
        </form>
    </div>
    @endsection

