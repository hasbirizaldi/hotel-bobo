<?php

namespace App\Models;

use App\Models\City;
use App\Models\Country;
use App\Models\HotelRoom;
use App\Models\HotelPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'link_gmap',
        'city_id',
        'country_id',
        'address',
        'star_level'
       
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function photos(){
        return $this->hasMany(HotelPhoto::class);
    }

    public function rooms(){
        return $this->hasMany(HotelRoom::class);
    }

    public function getLowestRoomPrice(){
        $minPrice = $this->rooms()->min('price');
        return $minPrice ?? 0;
    }
    
}