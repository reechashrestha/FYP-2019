<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $primaryKey='bookings_id';
    protected $table= 'tbl_payment';
    protected $fillable=[
        'payment_id','payment_method','payment_status'
    ];

    public function items(){
        return $this->hasMany('App/Items');

    }

    public function regulartems(){
        return $this->hasMany('App/RegularItems');
    }
}
