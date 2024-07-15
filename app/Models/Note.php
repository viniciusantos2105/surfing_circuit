<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'note_id';
    const NOTE_ID = 'note_id';
    const NOTE_WAVE = 'wave_id';
    const PARTIAL_SCORE1 = 'partialScore1';
    const PARTIAL_SCORE2 = 'partialScore2';
    const PARTIAL_SCORE3 = 'partialScore3';

    protected $fillable = [
        self::NOTE_WAVE, self::PARTIAL_SCORE1, self::PARTIAL_SCORE2, self::PARTIAL_SCORE3,
    ];

    public function noteWave(): BelongsTo
    {
        return $this->belongsTo(Wave::class, self::NOTE_WAVE, self::NOTE_WAVE);
    }
}
