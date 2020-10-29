<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'company_name', 'office_number', 'owner_name', 'logo_img'];
    protected $with = ['user']; // Eager loads the user relationship;

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
