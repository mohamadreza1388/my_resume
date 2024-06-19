<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WayCommunication extends Model
{
    use HasFactory;
    protected $fillable =["tooltip","font_icon_class","img_src","title","link_id","platform_name","at"];
    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
