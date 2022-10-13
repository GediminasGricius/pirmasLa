<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{

    use HasFactory;


    public function products(){
        return $this->hasMany(Product::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMy( $query){
        $query->where('user_id',Auth::user()->id);
        $query->orderBy('name', 'DESC');
        return $query;
    }

    public static function getMyCategories(){
        return Category::where('user_id',Auth::user()->id)->get();
    }


}
