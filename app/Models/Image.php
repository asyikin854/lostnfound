<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['filename', 'path', 'name', 'phoneNo', 'itemName', 'itemDesc', 'location', 'status', 'claim_by'];

    public function adminImage(){
        return $this->belongsTo(User::class, 'admin_location', 'admin_location');
}
    
}
