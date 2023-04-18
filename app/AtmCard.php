<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtmCard extends Model
{
    // use HasFactory;
    protected $table = 'atm_cards';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'bank_id', 'card_name','place_id'
    ];

    public $timestamps = true;

    public function banks()
    {
        return $this->belongsTo('App\Bank');
    }
}
