<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    //relacja tabeli services z orders
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'service_orders');
    }
}
