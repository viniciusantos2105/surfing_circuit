<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heat extends Model
{

    protected $heatId;
    protected $heatSurfer1;
    protected $heatSurfer2;

    protected $fillable = [
        '$heatSurfer1', '$heatSurfer2',
    ];

    public function heatSurfer1()
    {
        return $this->belongsTo(Surfer::class);
    }

    public function heatSurfer2()
    {
        return $this->belongsTo(Surfer::class);
    }
}
