<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitPrice extends Model
{
    use HasFactory;

    protected $fillable = ['price'];

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
