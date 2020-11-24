<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormAnswer extends Model
{

    protected $guarded = [

    ];

    public function form() {
        return $this->belongsTo(Form::class);
    }

    public function visitor() {
        return $this->belongsTo(Visitor::class);
    }



}
