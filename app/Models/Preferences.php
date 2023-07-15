<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'commission', 'welcome_bonus', 'sms_doctor_booked', 'sms_patient_appointed', 'sms_patient_completed', 'sms_doctor_credited'];

}
