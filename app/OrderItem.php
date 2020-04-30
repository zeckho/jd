<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'product_id',
        'qty',
        'price',
        'discount',
    ];

    protected $appends = ['sub_price'];

    public function products()
    {
        return $this->belongsTo('App\product', 'product_id');
    }

    public function getSubPriceAttribute()
    {
        if($this->discount)
        {
            $total = $this->qty * $this->price;
            $discount = ($total * $this->discount) / 100; 
            return ($total - $discount);
        }

        return $this->price;
    }
    
    public function getTotalAttribute()
    {
        if($this->discount)
        {
            $total = $this->qty * $this->price;
            $discount = ($total * $this->discount) / 100; 
            return ($total - $discount);
        }

        return $this->price;
    }
}
