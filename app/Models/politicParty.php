<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class politicParty extends Model
{
    use HasFactory, SoftDeletes;

    public $nameShort;
    public $nameParty;
    public $numberVotes;
    public $threshold;
    public $seatsObtained;
    public $seats;
    public $porcentageVotes;
    public $numberVotesLost;
    public $thresholdDistance;
    public $chocie_id;
    public $calculationData;

    protected $table = 'politicParty';
    protected $fillable = [
        'id',
        'nameShort',
        'nameParty',
        'numberVotes',
        'threshold',
        'seatsObtained',
        'seats',
        'porcentageVotes',
        'numberVotesLost',
        'thresholdDistance',
        'chocie_id',
        'calculationData'
    ];

    public function chocie(): BelongsTo
    {
        return $this->belongsTo(Chocie::class);
    }
}
