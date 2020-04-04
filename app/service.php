<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $primaryKey='service_id';
    protected $table= 'tbl_service';
    protected $fillable=[
        'category_id','service_name','service_desc','service_image','service_status'
    ];


    public function items(){
        return $this->hasMany('App/Items');

    }

    public function regulartems(){
        return $this->hasMany('App/RegularItems');
    }
}
