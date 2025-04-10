<?php

namespace App;

use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['mfg','exp'];
    protected $fillable = ['product_name', 'price', 'description', 'image'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function unit(){
        return $this->belongsTo('App\Unit');
    }
    public function size(){
        return $this->belongsTo('App\Size');
    }
    public function product_type(){
        return $this->belongsTo('App\ProductType');
    }

    public function brand(){
        return $this->belongsTo('App\Brand');
    }

}
