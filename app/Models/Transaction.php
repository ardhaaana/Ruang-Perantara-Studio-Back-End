<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'users_id', 'address', 'payment', 'total_price', 'shipping_price', 'status'
    ];
    
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transactions_id', 'id');
    }
     public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

     public function transfer()
    {
        return $this->belongsTo(TransferConfirm::class, 'users_id', 'id');
    }

    
}
