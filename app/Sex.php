<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $primaryKey = 'sex_id';
    public $timestamps = false;
    
    public function user()
    {
        return $this->hasMany(User::class, 'sex_id');
    }
}