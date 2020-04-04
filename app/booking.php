<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $primaryKey='bookings_id';
    protected $table= 'tbl_bookings';
    protected $fillable=[
        'customer_id','payment_id','booking_total','booking_status'
    ];

    public function items(){
        return $this->hasMany('App/Items');

    }

    public function regulartems(){
        return $this->hasMany('App/RegularItems');
    }
}
