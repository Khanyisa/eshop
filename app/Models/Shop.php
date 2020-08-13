<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $primaryKey = "shopId";
    protected $fillable = ['name','addressline1','addressline2','city','postalcode','imgfilepath'];
    public function products()
    {
        return $this->hasMany('App\Models\Product','productId');
    }

}
