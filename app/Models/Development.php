<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Development extends Model
{
    use HasFactory;
    protected $fillable = ["name"];
    public function examples_of_works()
    {
        return $this->belongsToMany(ExamplesOfWork::class);
    }
}
