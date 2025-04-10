<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Challan extends Model
{
    protected $fillable = [
        "challan_date",
        "delivery_date",
        "customer",
        "phone",
        "address",
        "created_by",
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany('App\Product')->withPivot('unit','qty');
    }
}
