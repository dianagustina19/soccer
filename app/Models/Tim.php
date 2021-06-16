<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tim extends Model
{
    use SoftDeletes;
    protected $table = "Tim";

    public function pertandingan()
    {
    	return $this->hasOne('App\Models\Pertandingan');
    }

    public function pertandingan2()
    {
    	return $this->hasOne('App\Models\Pertandingan');
    }

    public function pemain()
    {
    	return $this->haOne('App\Models\pemain');
    }
}
