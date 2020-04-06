<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    
    protected $fillable = [
        'name', 'price'
    ];

    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
}
}