<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    // Define the table name if it's not the plural of the model name
    protected $table = 'patients';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'email',
        'phone_number',
        'address',
        'gender'
    ];
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
