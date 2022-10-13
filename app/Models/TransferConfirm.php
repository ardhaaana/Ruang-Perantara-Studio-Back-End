<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferConfirm extends Model
{
    public $table = "transfer_confirm";

    protected $fillable = [
        'id', 'image', 'date'
    ];
    
      public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'id');
    }
     public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class,'id','total_price');
    }

    
}
