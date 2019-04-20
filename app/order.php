<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['product_id','quantity','user_id','address','phonenumber'];

    public function user(){
        return $this->belongsTo(User::class);   
     }

     public function product(){
        return $this->belongsTo(Product::class);   
     }
}
