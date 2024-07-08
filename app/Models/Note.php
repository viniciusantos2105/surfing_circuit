<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
   protected $noteId;
   protected $noteWave;
   protected $partialScore1;
    protected $partialScore2;
    protected $partialScore3;

    protected $fillable = [
        '$noteWave', '$partialScore1', '$partialScore2', '$partialScore3',
    ];

    public function noteWave()
    {
        return $this->belongsTo(Wave::class);
    }
}
