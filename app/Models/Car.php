<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'luggage',
        'doors',
        'passenger',
        'price',
        'published',
        'image',
        'category_id'
        ];
    
        public function category(){
            return $this->belongsTo(Category::class);
        }

    //     public function getLimitedDescriptionAttribute()
    // {
    //     return Str::words($this->content, 50, '...');
    // }
}
