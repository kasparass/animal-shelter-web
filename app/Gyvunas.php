<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gyvunas extends Model
{
    //
    public function user() {
        return $this->belongsTo(User::class);
    }
}
