<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'category_id',
		// 'image',
        'name',
        'price',
        'stock',
        'description',
    ];

    // protected $appends = ['format_description'];

    // public function formatDescription(): Attribute
    // {
    //     return Attribute::make(
    //         get: function ($value, $attributes){
    //             return Str::limit($attributes['description'],80, '...');
    //         },
    //         // set: fn($value) =>Str::upper($value)
    //     );
    // }



    // /*
    //     Book::with('category','author')->get();
    // */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'product_id', 'id');
    }
    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
