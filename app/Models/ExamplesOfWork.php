<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamplesOfWork extends Model
{
    use HasFactory;
    protected $fillable = ["img_src","work_title","url_address","information_title"];
    public function developments()
    {
        return $this->belongsToMany(Development::class);
    }
}
