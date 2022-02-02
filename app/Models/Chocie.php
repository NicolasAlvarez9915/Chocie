<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static where(string $string, $customer_id)
 */
class Chocie extends Model
{
    use HasFactory, SoftDeletes;

    public $chocieName;
    public $id;
    public $numberVotes;
    public $numberVotesWrite;
    public $seats;
    public $distributorFigure;

    protected $table = 'chocie';
    protected $fillable = [
        'id',
        'chocieName',
        'numberVotes',
        'numberVotesWrite',
        'seats',
        'distributorFigure'
    ];


    public function politicParty(): HasMany
    {
        return $this->hasMany(PoliticParty::class);
    }
    public function Todos(){
        return $this->politicParty()->get();
    }

}
