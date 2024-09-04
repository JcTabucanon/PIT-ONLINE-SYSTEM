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
        <h2 class="text-3xl font-bold mb-5">Appointments</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-5">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add New Appointment Button -->
        <div class="btn btn-primary">
            <a href="{{ route('appointments.create') }}" class="btn btn-primary">
                Add New Appointment
            </a>
        </div>

        <!-- Appointments Table -->
        <table class="table">
            <thead>
                <tr>
                    <th class="">Patient Name</th>
                    <th class="">Doctor Name</th>
                    <th class="">Appointment Date & Time</th>
                    <th class="">Reason</th>
                    <th class="">Status</th>
                    <th class="">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td class="">{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</td>
                        <td class="">{{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</td>
                        <td class="">{{ $appointment->appointment_date->format('Y-m-d H:i') }}</td>
                        <td class="">{{ $appointment->reason }}</td>
                        <td class="">{{ $appointment->status }}</td>
                        <td class="">
                            <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
