<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    // use HasFactory;
    protected $table = 'banks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'bank_name', 'bank_address', 'bank_number','place_id','latitude','longtitude'
    ];

    public $timestamps = true;
    //Ngân hàng có nhiều phòng giao dịch
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
    //Ngân hàng chấp nhận nhiều thẻ ATM
    public function atm_cards()
    {
        return $this->hasMany('App\AtmCard');
    }
}
