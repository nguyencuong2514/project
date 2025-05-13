<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    // Một danh mục có nhiều bất động sản
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
