<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = ['title'];

    public function work_sample()
    {
        return $this->belongsTo(WorkSample::class);
    }
}
