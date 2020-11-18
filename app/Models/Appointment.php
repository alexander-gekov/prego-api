<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
