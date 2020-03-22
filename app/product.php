<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['name','category_id','image','description','price','quantity','brand_id','user_id','image'];

    public function category(){
        return $this->belongsTo(Category::class);   
     }

     public function brand(){
      return $this->belongsTo(Brand::class);   

     }

     public function user(){
        return $this->belongsTo(User::class);   
     }

     public function order(){
      return $this->belongsTo(Order::class);
   }
   public function comments(){
      return $this->hasMany(Comment::class);
   }
}  

