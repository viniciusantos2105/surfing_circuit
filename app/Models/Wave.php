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
    protected $primaryKey = self::WAVE_ID;
    const WAVE_ID = 'wave_id';
    const WAVE_SURFER_NUMBER = 'surfer_number';
    const WAVE_HEAT_ID = 'heat_id';

    protected $fillable = [
        self::WAVE_HEAT_ID, self::WAVE_SURFER_NUMBER,
    ];

    public function waveHeat(): BelongsTo
    {
        return $this->belongsTo(Heat::class, 'heat_id', 'heat_id');
    }

    public function waveSurfer(): BelongsTo
    {
        return $this->belongsTo(Surfer::class, 'surfer_number', 'surfer_number');
    }

    /**
     * @return mixed
     */
    public function getWaveId()
    {
        return $this->getAttribute(self::WAVE_ID);
    }

    public function getWaveSurfer()
    {
        return $this->getAttribute(self::WAVE_SURFER_NUMBER);
    }

    public function getWaveHeat()
    {
        return $this->getAttribute(self::WAVE_HEAT_ID);
    }
}
