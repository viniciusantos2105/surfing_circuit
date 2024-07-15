<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Heat extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'heat_id';
    const HEAT_ID = 'heat_id';
    const HEAT_SURFER1 = 'surfer1_number';
    const HEAT_SURFER2 = 'surfer2_number';

    protected $fillable = [
         self::HEAT_SURFER1, self::HEAT_SURFER2,
    ];

    public function heatSurfer1(): BelongsTo
    {
        return $this->belongsTo(Surfer::class, self::HEAT_SURFER1, 'surfer_number');
    }

    public function heatSurfer2() : BelongsTo
    {
        return $this->belongsTo(Surfer::class, self::HEAT_SURFER2, 'surfer_number');
    }

    /**
     * @return mixed
     */
    public function getHeatId()
    {
        return $this->getAttribute(self::HEAT_ID);
    }

    /**
     * @return mixed
     */
    public function getHeatSurfer1()
    {
        return $this->getAttribute(self::HEAT_SURFER1);
    }

    /**
     * @return mixed
     */
    public function getHeatSurfer2()
    {
        return $this->getAttribute(self::HEAT_SURFER2);
    }



}
