<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'bank_id', 'trans_name', 'trans_address', 'trans_phone','place_id','latitude','longtitude'
    ];

    public $timestamps = true;

    public function banks()
    {
        return $this->belongsTo('App\Bank');
    }
}
