<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodcut extends Model
{
    protected $fillable = [
        'name',
        'type',
        'color',
        'Brand_id',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    use HasFactory;
}
