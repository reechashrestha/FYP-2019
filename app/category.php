<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $primaryKey='category_id';
    protected $table= 'tbl_category';
    protected $fillable=[
        'category_name','category_description','category_status'
    ];

    public function items(){
        return $this->hasMany('App/Items');

    }

    public function regulartems(){
        return $this->hasMany('App/RegularItems');
    }
}
