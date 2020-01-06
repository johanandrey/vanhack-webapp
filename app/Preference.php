<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    
    public function pet(){
        return $this->hasOne('App\Pet', 'id', 'pet_id');
    }

    public function color(){
        return $this->hasOne('App\Color', 'id', 'color_id');
    }

    protected $fillable = [
        'name', 'pet_id', 'color_id'
    ];
}
