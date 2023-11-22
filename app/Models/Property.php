<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'county',
        'country',
        'town',
        'description',
        'full_details_url',
        'displayable_address',
        'image_url',
        'thumbnail_url',
        'latitude',
        'longitude',
        'num_bedrooms',
        'num_bathrooms',
        'price',
        'type',
        'property_type'        
    ];

    protected $casts = [
        'property_type' => 'array',
    ];

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', \Carbon\Carbon::today());
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeRent($query, $type)
    {
        return $query->where('type', 'rent');
    }

    public function scopeSale($query)
    {
        return $query->where('type', 'sale');
    }
}
