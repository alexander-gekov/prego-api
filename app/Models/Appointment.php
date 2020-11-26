<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = ['laravel_through_key'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // TBR consult about this
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
