<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Heat extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'heat_id';

    protected $heatId;
    protected $heatSurfer1;
    protected $heatSurfer2;

    protected $fillable = [
         'surfer1_number', 'surfer2_number',
    ];

    public function heatSurfer1(): BelongsTo
    {
        return $this->belongsTo(Surfer::class);
    }

    public function heatSurfer2() : BelongsTo
    {
        return $this->belongsTo(Surfer::class);
    }

    /**
     * @return mixed
     */
    public function getHeatId()
    {
        return $this->heatId;
    }

    /**
     * @param mixed $heatId
     */
    public function setHeatId($heatId): void
    {
        $this->heatId = $heatId;
    }

    /**
     * @return mixed
     */
    public function getHeatSurfer1()
    {
        return $this->heatSurfer1;
    }

    /**
     * @param mixed $heatSurfer1
     */
    public function setHeatSurfer1($heatSurfer1): void
    {
        $this->heatSurfer1 = $heatSurfer1;
    }

    /**
     * @return mixed
     */
    public function getHeatSurfer2()
    {
        return $this->heatSurfer2;
    }

    /**
     * @param mixed $heatSurfer2
     */
    public function setHeatSurfer2($heatSurfer2): void
    {
        $this->heatSurfer2 = $heatSurfer2;
    }



}
