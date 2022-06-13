<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
