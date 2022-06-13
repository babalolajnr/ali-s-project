<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function principal()
    {
        return $this->belongsTo(Principal::class);
    }

    public function paymentMode()
    {
        return $this->belongsTo(PaymentMode::class);
    }

    public function unitPrice()
    {
        return $this->belongsTo(UnitPrice::class);
    }

    public function quarter()
    {
        return $this->belongsTo(Quarter::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
