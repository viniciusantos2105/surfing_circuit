<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wave extends Model
{
   protected $waveId;

    protected $fillable = [
        '$waveBattery', '$waveSurfer',
    ];

    public function waveBattery(): BelongsTo
    {
        return $this->belongsTo(Heat::class);
    }

    public function waveSurfer() : BelongsTo
    {
        return $this->belongsTo(Surfer::class);
    }
}
