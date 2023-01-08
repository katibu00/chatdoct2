<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function book(){
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function patient(){
        return $this->belongsTo(User::class, 'patient_id');
    }
}

