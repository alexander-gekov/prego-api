<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $with = ['user']; // Eager loads the user relationship;

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function appointments()
    {
        return $this->hasManyThrough(Appointment::class, Employee::class);
    }
}
