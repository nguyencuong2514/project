<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'price',
        'area',
        'facade',
        'direction',
        'address',
        'description',
        'views',
        'posted_date',
        'image',
        'user_id',
        'property_type_id',
        'location_id',
        'status',
        'view_count',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
