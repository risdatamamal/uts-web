<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function descriptions() {
        return $this->hasMany(Description::class);
    }

    public function publishers() {
        return $this->belongsToMany(Publisher::class);
    }
}
