<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    //
    protected $fillable = ['user_id', 'tajuk', 'aduan', 'tarikh_aduan'];


    public function user() {
        return $this->belongsTo('\App\User');
    }
}
