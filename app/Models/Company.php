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

    public function appointments()
    {
        return $this->hasManyThrough(Appointment::class, Employee::class);
//            'country_id', // Foreign key on users table...
//            'user_id', // Foreign key on posts table...
//            'id', // Local key on countries table...
//            'id' // Local key on users table...

    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
