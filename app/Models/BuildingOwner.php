<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingOwner extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['user']; // Eager loads the user relationship;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
