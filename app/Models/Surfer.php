<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surfer extends Model
{
    public $timestamps = false;
    protected $primaryKey = self::SURFER_NUMBER;
    const SURFER_NUMBER = 'surfer_number';
    const SURFER_NAME = 'surfer_name';
    const SURFER_COUNTRY = 'surfer_country';

    protected $fillable = [
        self::SURFER_NAME, self::SURFER_COUNTRY,
    ];

    /**
     * @return mixed
     */
    public function getSurferNumber()
    {
        return $this->getAttribute(self::SURFER_NUMBER);
    }

    /**
     * @return mixed
     */
    public function getSurferName()
    {
        return $this->getAttribute(self::SURFER_NAME);
    }

    /**
     * @return mixed
     */
    public function getSurferCountry()
    {
        return $this->getAttribute(self::SURFER_COUNTRY);
    }



}
