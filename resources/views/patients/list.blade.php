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
    <h1 class="text-3xl font-bold mb-5">Patients List</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-5">
            {{ session('success') }}
        </div>
    @endif
    <!-- Add New Appointment Button -->
    <div class="btn btn-primary">
        <a href="{{ route('patients.create') }}" class="btn btn-primary">
            Add New Patient
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class="">ID</th>
                <th class="">First Name</th>
                <th class="">Last Name</th>
                <th class="">Date of Birth</th>
                <th class="">Email</th>
                <th class="">Phone</th>
                <th class="">Address</th>
                <th class="">Gender</th>
                <th class="">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td class="">{{ $patient->id }}</td>
                    <td class="">{{ $patient->first_name }}</td>
                    <td class="">{{ $patient->last_name }}</td>
                    <td class="">{{ $patient->date_of_birth}}</td>
                    <td class="">{{ $patient->email }}</td>
                    <td class="">{{ $patient->phone_number }}</td>
                    <td class="">{{ $patient->address }}</td>
                    <td class="">{{ $patient->gender }}</td>
                    <td class="">
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a> |
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
