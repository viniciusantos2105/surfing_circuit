<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wave extends Model
{
    public $timestamps = false;
    /**
     * @var mixed
     */
    protected $primaryKey = 'wave_id';
    protected $waveId;

    protected $fillable = [
        'heat_id', 'surfer_number',
    ];

    public function waveHeat(): BelongsTo
    {
        return $this->belongsTo(Heat::class);
    }

    public function waveSurfer(): BelongsTo
    {
        return $this->belongsTo(Surfer::class);
    }

    /**
     * @return mixed
     */
    public function getWaveId()
    {
        return $this->waveId;
    }


}
