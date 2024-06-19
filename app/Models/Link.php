<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = ["title","link"];
    public function way_communications()
    {
        return $this->hasMany(WayCommunication::class);
    }
}
