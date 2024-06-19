<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;
    protected $fillable = ["img_src","title","theme_id"];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
