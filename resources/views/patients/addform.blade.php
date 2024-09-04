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
    <h2 class="text-2xl font-bold mb-5">{{ isset($patient) ? 'Edit Patient' : 'Add New Patient' }}</h2>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($patient) ? route('patients.update', $patient->id) : route('patients.store') }}" method="POST" class="form">
        @csrf
        @if(isset($patient))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="first_name" class="block text-gray-700">First Name:</label>
            <input type="text" id="first_name" name="first_name" class="form-control p-2 border border-gray-300 rounded" value="{{ old('first_name', $patient->first_name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="last_name" class="block text-gray-700">Last Name:</label>
            <input type="text" id="last_name" name="last_name" class="form-control p-2 border border-gray-300 rounded" value="{{ old('last_name', $patient->last_name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="birthdate" class="block text-gray-700">Date of Birth:</label>
            <input type="date" id="birthdate" name="date_of_birth" class="form-control p-2 border border-gray-300 rounded" value="{{ old('birthdate', $patient->birthdate ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" name="email" class="form-control p-2 border border-gray-300 rounded" value="{{ old('email', $patient->email ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="phone" class="block text-gray-700">Phone:</label>
            <input type="text" id="phone" name="phone_number" class="form-control p-2 border border-gray-300 rounded" value="{{ old('phone', $patient->phone ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="address" class="block text-gray-700">Address:</label>
            <input type="text" id="address" name="address" class="form-control p-2 border border-gray-300 rounded" value="{{ old('address', $patient->address ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="gender" class="block text-gray-700">Gender:</label>
            <select id="gender" name="gender" class="form-control p-2 border border-gray-300 rounded">
                <option value="Male" {{ (old('gender', $patient->gender ?? '') == 'Male') ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ (old('gender', $patient->gender ?? '') == 'Female') ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ isset($patient) ? 'Update Patient' : 'Add Patient' }}
            </button>
        </div>
    </form>
</div>
    @endsection
