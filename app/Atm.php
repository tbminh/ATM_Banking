<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    // use HasFactory;
    protected $table = 'atms';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'bank_id', 'atm_name', 'atm_address','place_id','latitude','longtitude'
    ];

    public $timestamps = true;

    public function banks()
    {
        return $this->belongsTo('App\Bank');
    }
}
