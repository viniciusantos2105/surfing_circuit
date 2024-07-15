<?php

namespace App\Dto\response;

class HeatViewResponse
{
    public $heatId;
    public $heatSurfer1;
    public $heatSurfer2;

    public function __construct($heatId, $heatSurfer1, $heatSurfer2)
    {
        $this->heatId = $heatId;
        $this->heatSurfer1 = $heatSurfer1;
        $this->heatSurfer2 = $heatSurfer2;
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
