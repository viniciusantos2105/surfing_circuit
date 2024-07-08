<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wave extends Model
{
   protected $waveId;

    protected $fillable = [
        '$waveBattery', '$waveSurfer',
    ];

    public function waveBattery()
    {
        return $this->belongsTo(Heat::class);
    }

    public function waveSurfer()
    {
        return $this->belongsTo(Surfer::class);
    }
}
