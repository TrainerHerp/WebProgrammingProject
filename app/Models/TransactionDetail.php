<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function item() {
        return $this->hasOne(Item::class)->withDefault();
    }

    public function transactionHeader() {
        return $this->belongsTo(TransactionHeader::class);
    }
}
