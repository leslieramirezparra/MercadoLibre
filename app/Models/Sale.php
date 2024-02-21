<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
	use HasFactory,SoftDeletes;

    protected $fillable = [
        'customer_user_id',
        'product_id',
        'date_out',
        'date_in',
        'status'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_user_id', 'id');
    }

}
