<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    public $guarded = [];

    public function appointments()
    {
        return $this->hasOne(Appointment::class);
    }
}
