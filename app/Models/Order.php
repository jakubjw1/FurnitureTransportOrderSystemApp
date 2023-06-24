<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_date',
        'payment_method',
        'service_date',
        'description',
        'total_amount',
        'order_status',
    ];

    // relacja tabeli orders z tabelą users
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // relacja tabeli orders z tabelą services
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'service_orders');
    }

}
