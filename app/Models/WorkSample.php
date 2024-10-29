<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkSample extends Model
{
    protected $fillable = [
        "title",
        "description",
        "thumbnail",
        "url"
    ];
}
