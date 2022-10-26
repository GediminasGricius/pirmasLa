<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnder10($query){
        $query->where('price','<',10);
        return $query;

    }
/*
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => $this->attributes['name']=$value
        );
    }
*/
    public function getFullNameAttribute(){
        return $this->attributes['name'].' '.$this->attributes['surname'];
    }

    public function getNameAttribute($name){
        return ucwords($name) ;
    }

    public function setNameAttribute($name){
        $this->attributes['name']=strtolower($name);
    }


    public function scopeUnder($query, $price){
        $query->where('price','<',$price);
        return $query;

    }
}
