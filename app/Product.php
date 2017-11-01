<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const AVAILABLE_PRODUCT = 'disponibile';
    const NOT_AVAILABLE_PRODUCT = 'terminato';

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
    ];

    public function avaible(){
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
