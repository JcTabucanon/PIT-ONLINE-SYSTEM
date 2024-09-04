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
    <h2 class="text-2xl font-bold mb-5">{{ isset($doctor) ? 'Edit Doctor' : 'Add New Doctor' }}</h2>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($doctor) ? route('doctors.update', $doctor->id) : route('doctors.store') }}" method="POST">
        @csrf
        @if(isset($doctor))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="first_name" class="block text-gray-700">First Name:</label>
            <input type="text" id="first_name" name="first_name" class="w-full p-2 border border-gray-300 rounded" value="{{ old('first_name', $doctor->first_name ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-gray-700">Last Name:</label>
            <input type="text" id="last_name" name="last_name" class="w-full p-2 border border-gray-300 rounded" value="{{ old('last_name', $doctor->last_name ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label for="specialization" class="block text-gray-700">Specialization:</label>
            <input type="text" id="specialization" name="specialization" class="w-full p-2 border border-gray-300 rounded" value="{{ old('specialization', $doctor->specialization ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded" value="{{ old('email', $doctor->email ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700">Phone:</label>
            <input type="text" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded" value="{{ old('phone', $doctor->phone ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label for="address" class="block text-gray-700">Address:</label>
            <input type="text" id="address" name="address" class="w-full p-2 border border-gray-300 rounded" value="{{ old('address', $doctor->address ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label for="gender" class="block text-gray-700">Gender:</label>
            <select id="gender" name="gender" class="w-full p-2 border border-gray-300 rounded">
                <option value="Male" {{ (old('gender', $doctor->gender ?? '') == 'Male') ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ (old('gender', $doctor->gender ?? '') == 'Female') ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                {{ isset($doctor) ? 'Update Doctor' : 'Add Doctor' }}
            </button>
        </div>
    </form>
</div>
@endsection
