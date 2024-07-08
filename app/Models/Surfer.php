<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surfer extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'surfer_number';
    protected $surferNumber;
    protected $surferName;
    protected $surferCountry;

    protected $fillable = [
        'surfer_name', 'surfer_country',
    ];

    /**
     * @return mixed
     */
    public function getSurferNumber()
    {
        return $this->surferNumber;
    }

    /**
     * @param mixed $surferNumber
     */
    public function setSurferNumber($surferNumber): void
    {
        $this->surferNumber = $surferNumber;
    }

    /**
     * @return mixed
     */
    public function getSurferName()
    {
        return $this->surferName;
    }

    /**
     * @param mixed $surferName
     */
    public function setSurferName($surferName): void
    {
        $this->surferName = $surferName;
    }

    /**
     * @return mixed
     */
    public function getSurferCountry()
    {
        return $this->surferCountry;
    }

    /**
     * @param mixed $surferCountry
     */
    public function setSurferCountry($surferCountry): void
    {
        $this->surferCountry = $surferCountry;
    }


}
